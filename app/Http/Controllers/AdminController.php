<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.index');
    }
    public function widget(){
        // return view('backend.widget');

        // get api from  other free uri //
        $client=new Client();
        $request = $client->get('https://api.publicapis.org/entries');
        if($request->getStatusCode() == 200){
            $response =json_decode($request->getBody());
             dd($response);            
            return view('backend.widget',compact('response'));
        }

    }
  
}

