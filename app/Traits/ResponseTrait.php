<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait{

    // create are controller instance
    // @param $msg
    // @param int $statusCode
    // @param bool $is_authorized
    // @return JsonResponse

    public function returnError($msg ,int $statusCode=200, bool $is_authorized =true){
        return response()->json([
           'status'       => false,
           'msg'          => $msg,
           'data'         => null,
           'is_authorized'=> $is_authorized
        ]
        ,$statusCode
        ,['content-Type'=>'application/json;charset:UTF-8']
        ,JSON_UNESCAPED_UNICODE
        );
    }

    // create are controller instance
    // @param $msg
    // @param int $statusCode
    // @return JsonResponse

    public function returnSuccess($msg ,int $statusCode=200){
        return response()->json([
           'status'       => true,
           'msg'          => $msg,
           'data'         => null,
           'is_authorized'=>true
        ]
        ,$statusCode
        ,['content-Type'=>'application/json;charset:UTF-8']
        ,JSON_UNESCAPED_UNICODE
        );
    }

    // create are controller instance
    // @param $msg
    // @param int $statusCode
    // @param bool $is_authorized
    // @return JsonResponse

    public function returnData($msg ,$value,int $statusCode=200){
        return response()->json([
           'status'       => true,
           'msg'          => $msg,
           'data'         => $value,
           'is_authorized'=> true
        ]
        ,$statusCode
        ,['content-Type'=>'application/json;charset:UTF-8']
        ,JSON_UNESCAPED_UNICODE
        );
    }

}
