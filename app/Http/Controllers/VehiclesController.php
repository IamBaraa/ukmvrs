<?php

namespace UKMVRS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use UKMVRS\Vehicle;
use UKMVRS\User;
use UKMVRS\RentalRecord;
use DB;
use Mail;

class VehiclesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('availability', '=', 'Available')->orderBy('created_at', 'desc')->paginate(6);
        return view('rvehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lvehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'plate_no' => 'required|unique:vehicles',
            'manufacturer' => 'required|string',
            'production_year' => 'required|integer',
            'model' => 'required|string',
            'type' => 'required|string',
            'price_per_day' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'price_per_hour' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('images'))
         {

            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
         }

        //Add a vehicle
        $vehicles= new Vehicle();
        $vehicles->plate_no = $request->input('plate_no');
        $vehicles->email = Auth()->user()->email;
        $vehicles->user_id = Auth()->user()->id;
        $vehicles->manufacturer = $request->input('manufacturer');
        $vehicles->production_year = $request->input('production_year');
        $vehicles->model = $request->input('model');
        $vehicles->type = $request->input('type');
        $vehicles->availability = 'Available';
        $vehicles->price_per_day = $request->input('price_per_day');
        $vehicles->price_per_hour = $request->input('price_per_hour');
        $vehicles->images=json_encode($data);

        $vehicles->save();

        $users = User::find($vehicles->user_id);
        $users->no_of_vehicles += 1;

        $users->save();

        return redirect('/myvehicles')->with('success', 'Your vehicle was added successfully (:');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicles = Vehicle::find($id);
        return view('rvehicles.show')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = Vehicle::find($id);
        return view('lvehicles.edit')->with('vehicles', $vehicles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'plate_no' => 'required',
            'manufacturer' => 'required|string',
            'production_year' => 'required|integer',
            'model' => 'required|string',
            'type' => 'required|string',
            'price_per_day' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'price_per_hour' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('images'))
         {

            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
         }

        //Update a vehicle
        $vehicles=Vehicle::find($id);
        $vehicles->plate_no = $request->input('plate_no');
        $vehicles->manufacturer = $request->input('manufacturer');
        $vehicles->production_year = $request->input('production_year');
        $vehicles->model = $request->input('model');
        $vehicles->type = $request->input('type');
        $vehicles->availability = 'Available';
        $vehicles->price_per_day = $request->input('price_per_day');
        $vehicles->price_per_hour = $request->input('price_per_hour');
        $vehicles->images=json_encode($data);
        $vehicles->save();


        return redirect('/myvehicles')->with('success', 'Your vehicle was updated successfully (:');
    }

    public function updateStatus(Request $request, $id)
    {
        $vehicles=Vehicle::find($id);
        $vehicles->availability = Input::get("status");
        $vehicles->save();

        return redirect('/myvehicles')->with('success', 'Your vehicles status was updated successfully (:');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($images)
    {

        $vehicles = Vehicle::find($id);
        $vehicles->delete();

        return redirect('/')->with('success', 'Your vehicle was deleted successfully (:');
    }

    public function hide($id)
    {

        $vehicles = Vehicle::find($id);
        $vehicles->availability = "Deleted";
        $vehicles->save();

        $users = User::find($vehicles->user_id);
        $users->no_of_vehicles -= 1;
        $users->save();

        return redirect('/myvehicles')->with('success', 'Your vehicle was deleted successfully (:');
    }

    public function notifyOwner(Request $request, $id)
    {
        $vehicles=Vehicle::find($id);
        $data = [
            'plate_no' => $vehicles->plate_no,
            'manufacturer' => $vehicles->manufacturer,
            'model' => $vehicles->model,
            'production_year' => $vehicles->production_year,
            'type' => $vehicles->type,
            'price_per_day' => $vehicles->price_per_day,
            'price_per_hour' => $vehicles->price_per_hour,
        ];

        $address = $vehicles->email;
        $plate_no = $vehicles->plate_no;
        $price_per_day = $vehicles->price_per_day;
        $price_per_hour = $vehicles->price_per_hour;
        $leasing_times = $vehicles->leasing_times;

        $rentalRecord = new RentalRecord;
        $rentalRecord->plate_no = $plate_no;
        $rentalRecord->customer_email = Auth()->user()->email;
        $rentDateTime = $request->input('rentTime');
        $returnDateTime = $request->input('returnTime');

        $rentalRecord->rent_datetime = $rentDateTime;
        $rentalRecord->return_datetime = $returnDateTime;
        $rentDuration = abs(strtotime($returnDateTime) - strtotime($rentDateTime));
        $years = floor($rentDuration / (365*60*60*24));
        $months = floor(($rentDuration - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
        $seconds = floor(($rentDuration - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
        if ($seconds > 30) {
            $minutes += 1;
            if ($minutes > 30) {
            $hours += 1;
            }
        }
        if ($years > 1){
            $months += $years * 12;
        }
        if ($months > 1) {
            $days += $months * 30;
        }

        $rentalRecord->total_price = ($days * $price_per_day) + ($hours * $price_per_hour);
        $rentalRecord->profit = (($days * $price_per_day) + ($hours * $price_per_hour)) * 0.1;
        $rentalRecord->save();

        Mail::send('rvehicles.notifyOwner', ["data1"=>$data], function($message) use($address){
            $message->to($address)
            ->subject('Your vehicle has been leased on UKM VRS');
            $message->from('ukmvrs@gmail.com','UKM VRS');
          });

          if (Mail::failures()) {
            return response()->Fail('Something went wrong! Please try again latter');
          }else{

            $vehicles = Vehicle::find($id);
            $vehicles->availability = "Leased";
            $vehicles->leasing_times += 1;
            $vehicles->total_profits += (($days * $price_per_day) + ($hours * $price_per_hour)) * 0.1;
            $vehicles->save();

            return view('rvehicles.rentSummary')->with('vehicles', $vehicles);
          }
   }

}
