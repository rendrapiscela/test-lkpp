<?php

namespace App\Http\Controllers\Api;

//import Model "Post"
use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "PostResource"
use App\Http\Resources\PostResource;
use App\Models\User;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class JdihController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "http://192.168.21.8/putri/web/v1/sim-cacm/regulation-jdih?access-token=CAhIljXL4tiRthiSyGHhUqObLUd9EYtzqkSnfu5oPAWaaJuwAp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"access-token\"\r\n\r\nCAhIljXL4tiRthiSyGHhUqObLUd9EYtzqkSnfu5oPAWaaJuw Ap\r\n-----011000010111000001101001--\r\n",
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "User-Agent: Thunder Client (https://www.thunderclient.com)",
                "content-type: multipart/form-data; boundary=---011000010111000001101001"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                return "cURL Error #:" . $err;
            } else {
                return $response;
            }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function filter(Request $request){
        $data = $this->index();
        $res = json_decode($data, true);
        //request id
        $id = $request->id;
        //user by id
        $type = User::where('id', $id)->first();
        if(!empty($type)){
            //parse to array
            $filterType = explode(",",$type->type);
            $result = collect($res['data']['items'])->toArray();
            $collect = collect($result)->whereIn('typeId', $filterType)->toArray();
            $map = [];
            foreach($collect as $key => $value){
                $map[] = $value;
            }
            return $map;
        }
        return response()->json(collect($res['data']['items'])->toArray());
    }

}