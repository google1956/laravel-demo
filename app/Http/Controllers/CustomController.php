<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CustomController extends Controller
{
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view("dashboard", compact('data'));;
    }

    public function tourism()
    {
        $tourisms = array();
        $data = array();

        if (Session::has('loginId')) {
            $tourisms = array(
                array('date' => 'July 15 - 20', 'name' => 'Singapore', 'price' => '$1000'),
                array('date' => 'August 1 - 7', 'name' => 'Thailand', 'price' => '$1500'),
                array('date' => 'August 3 - 8', 'name' => 'China', 'price' => '$1800'),
            );
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view("tourism", ['tourisms' => $tourisms, 'data' => $data]);;
    }

    public function food()
    {
        $tourisms = array();
        $data = array();
        if (Session::has('loginId')) {
            $tourisms = array(
                array('name' => 'Burguer option 1', 'price' => '$32'),
                array('name' => 'Burguer option 2', 'price' => '$20'),
                array('name' => 'Burguer option 3', 'price' => '$24'),
                array('name' => 'Pizza option 1', 'price' => '$50'),
                array('name' => 'Pizza option 2', 'price' => '$70'),
                array('name' => 'Pizza option 3', 'price' => '$85'),
            );
            $data = User::where('id', '=', Session::get('loginId'))->first();

        }
        return view("food", ['tourisms' => $tourisms, 'data' => $data]);;
    }

    public function about()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view("about", compact('data'));;
    }
}
