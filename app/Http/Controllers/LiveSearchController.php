<?php

namespace UKMVRS\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
        function index(){
         return view('liveSearch');
    }

    function action(Request $request)
    {
     if($request->ajax()){
      $output = '';
      $query = $request->get('query');
      if($query != ''){
       $data = DB::table('vehicles')
         ->where('manufacturer', 'like', '%'.$query.'%')->where('availability', '=', 'Available')
         ->orWhere('model', 'like', $query.'%')->where('availability', '=', 'Available')
         ->orWhere('type', 'like', '%'.$query.'%')->where('availability', '=', 'Available')
         ->orWhere('production_year', '=', $query)->where('availability', '=', 'Available')
         ->orwhere('price_per_day', '=', $query)->where('availability', '=', 'Available')
         ->orWhere('price_per_hour', '=', $query)->where('availability', '=', 'Available')
         ->orderBy('id', 'desc')
         ->get();
      }else{
       $data = DB::table('vehicles')
         ->where('availability', '=', 'Available')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0){
       foreach($data as $row){
        $output .= '
        <tr>
         <td><a href="/vehicle/'.$row->id.'">'.$row->manufacturer.'</td>
         <td><a href="/vehicle/'.$row->id.'">'.$row->model.'</td>
         <td>'.$row->type.'</td>
         <td>'.$row->production_year.'</td>
         <td>'.$row->price_per_day.'</td>
         <td>'.$row->price_per_hour.'</td>
        </tr>
        ';
       }
      }else{
       $output = '
       <tr>
        <td align="center" colspan="6">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
