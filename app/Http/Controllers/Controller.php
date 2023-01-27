<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function alert($msg,$body,$type){
        Session::flash('alert', [
            'msg' => $msg,
            'body' => $body,
            'type' => $type
        ]);
    }

    public function quote(){
        $quote = file_get_contents("https://api.quotable.io/random");
        $quote = json_decode($quote);
        return $quote;
    }
}
