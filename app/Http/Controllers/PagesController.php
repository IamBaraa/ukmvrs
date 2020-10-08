<?php

namespace UKMVRS\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To UKM VRS';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
    public function team(){
        $title = 'Development Team';
        return view('pages.team')->with('title', $title);
    }

    public function rentSummary(){
        $title = 'Rent summary';
        return view('rvehicles.rentSummary')->with('title', $title);
    }

    public function bookingTime(){
        $title = 'Booking time';
        return view('rvehicles.bookingTime')->with('title', $title);
    }

}
