<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PhotoController extends Controller
{
 
    public function update(Request $request){

        $user = UserAuth();

        $img_base64_data = $request->input("base64-photo");

        $image_array_1 = explode(";", $img_base64_data);
        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);

        $imageName = "base64-". time() .'.png';

        dump($imageName);

        Storage::disk('local')->put('file.txt', 'Contents');

        if(($request->has("change_pass"))){
            
            session()->put('form_export', $FormPass->export_results());
        }
     
        return redirect()->back();
    }

    public function api_delete(Request $request){
        return json_encode([
            "photo" => asset(config('var.user_default_photo'))
        ]);
    }
 
}

?>

