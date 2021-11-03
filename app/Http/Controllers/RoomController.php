<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


class RoomController extends Controller
{
    //
    public function index(){
        Nexmo::message()->send([

            'to'=>'254728234794',
            'from'=>'254727729981',
            'text'=>"Please confirm that you have received this text by calling back"
        ]);
        
        echo "Message sent now";
    }
}
