<?php
   
namespace App\Http\Controllers;
use Nexmo\Laravel\Facade\Nexmo;

use Illuminate\Http\Request;
use Exception;
   
class NexmoSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        try {
   
            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
   
            $receiverNumber = "254740529082";
            $message = "Call me now please its urgent";
   
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => '254727729981',
                'text' => $message
            ]);
   
            dd('SMS Sent Successfully.');
               
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}