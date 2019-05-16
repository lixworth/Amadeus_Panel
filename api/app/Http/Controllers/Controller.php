<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 *     _                        _
 *    / \   _ __ ___   __ _  __| | ___ _   _ ___
 *   / _ \ | '_ ` _ \ / _` |/ _` |/ _ \ | | / __|
 *  / ___ \| | | | | | (_| | (_| |  __/ |_| \__ \
 * /_/   \_\_| |_| |_|\__,_|\__,_|\___|\__,_|___/
 *
 *「王来承认，王来允许，王来背负整个世界」-- William
 *
 * Class Controller
 * @package App\Http\Controllers
 * @author LixWorth<lixworth@gmail.com>
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getApiInfo(){
        return array(
            'version' => 1,
        );
    }

    public static function respondJson($success,$msg,$data = array(),$error = 0){
        return [
            'success' => $success,
            'error' => $error,
            'message' => $msg,
            'data' => $data,
            'api' => self::getApiInfo()
        ];
    }
}
