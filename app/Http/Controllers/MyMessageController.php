<?php

namespace App\Http\Controllers;
use Nexmo\Laravel\Facade\Nexmo;

//+15407924183
use Illuminate\Http\Request;

class MyMessageController extends Controller
{
    //
    public function message(Request $request){

      //  \Notification::send(User::all(), new CustomSmsNotification($request->input('message')));

        $message=$request->input('message');
        $telephone=$request->input('telephone');
        $encodeMessage=urlencode($message);
        $authkey ='';
        $senderID='';
        $route=4;
        $postData=$request->all();
      
        $telNumber=implode('',$postData['telephone']);
       
         
       $arr=str_split($telNumber,'10');

       $telephones= implode(",",$arr);
       /* print_r($telephones);
       exit(); */

       $data=array(
           'authkey' =>$authkey,           
           'telephones' =>$telephones,           
           'message' => $encodeMessage,           
           'sender' =>$senderID,    
           'route' =>$route,    
           
       );

       $url = "https://rest.nexmo.com/sms/json";
       $ch = curl_init();
       curl_setopt_array($ch, array(
       CURLOPT_URL => $url,
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_POST => true,
      // CURLOPT_POSTFIELDS => $postData
       CURLOPT_POSTFIELDS => http_build_query($postData),

       ));

       //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYpeer, 0);

      curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

       $output = curl_exec($ch);

       if (curl_errno($ch)) {
       echo 'error:' . curl_errno($ch);
       }
       curl_close($ch);
       return redirect('/home')->with('response','Message successfully sent');
      // return redirect('/create');







      /*  $url="";
       $ch=curl_init();
       curl_setopt_array($ch,array(
           CURLOPT_URL =>$url,
           CURLOPT_RETURNTRANSFER=>true,
           CURLOPT_POST=>true,
           CURLOPT_POSTFIELDS=>$postData
       ));

       curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
       curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

       $output=curl_exec($ch); */

/*        $postData = json_encode($data);

// Prepare new cURL resource
$ch = curl_init('');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postData))
);

// Submit the POST request
$output = curl_exec($ch);

// Close cURL session handle

       if(curl_errno($ch)){

        echo 'error:' .curl_errno($ch);
       }

       curl_close($ch);
       return redirect('/home')->with('response','Message successfully sent'); */


    }
}


