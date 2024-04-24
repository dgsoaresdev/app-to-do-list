<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notificationApp($type="",$msg="")
    {
        session([$type => $msg]);
    }

    /*
    ===============================================================================================================
    #Validações de campos
    ===============================================================================================================
    */

    public function RemoveSpecialChar($str){
      
        
        $res = str_ireplace( array( '\'', '"', ',' , ';', '<', '>', '.', '-', ' ', '(', ')' ), '', $str);
        // Returning the result 
        return $res;
    }
}
