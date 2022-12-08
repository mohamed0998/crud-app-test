<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class userController extends Controller
{
    
   function list()
   {
    return response()-> json(['status' => true, 'message' => 'user successfully fetched.', 'users' =>User::with(['roles','address','contact'])->get()]);
   }
   
   function add(Request $request){
    try {
        $userId = Str::random(2).''.random_int( 10000,99999);
        $user = new User();
        $user-> userId=  $userId;
        $user -> username = $request -> username;
        $user -> fullname = $request -> fullname;
        $user -> gender = $request -> gender;
        $user -> email = $request -> email;
        $user -> emailPec = $request -> emailPec;
        $user ->dateOfBirth =$request -> dateOfBirth;

        if($user->save()){
            return response()->json(['status' => true, 'message' => 'user succesfully added.'], 200);
        }else {
            return response()->json(['status'=>false, 'message' =>'Something wrong.'], 401);
        }

    } catch (Exception $ex) {
        return response()->json(
            [

                'result' => [
                    'status' => false,
                    'message' => $ex ->getMessage(),
                ]
                ],
                500
            );
    }
   }

   public function update(Request $request, $userId)
   {
 
     try {
        $user = user::where('userId', '=', $userId)->first();
 
       if (!($user)) {
         return response()->json(['error' => "Can't find user with id " . $id,], 404);
       }
 
        $user->update([
            $user -> username = $request -> username,
            $user -> fullname = $request -> fullname,
            $user -> gender = $request -> gender,
            $user -> email = $request -> email,
            $user -> emailPec = $request -> emailPec,
            $user ->dateOfBirth =$request -> dateOfBirth,
       ]);

       return response()->json(['msg' => "Update successful",], 204);
     } catch (Exception $ex) {
       return response()->json(['error' => "Can't update user with id " . $id,], 500);
     }
   }


   function delete($userId){
    try {
        $user = user::where('userId', '=', $userId)->first();
        if($user){
            if($user->delete()) {
                return response() -> json(['status' => true, 'message' =>'user succefully deleted.'], 200);
            } else {
                return response() -> json(['status' => false,'message' =>'Something wrong '], 401);

            }
        } else {
            return response() -> json(['status' => false,'message'=> 'user does not existe'],401);
        }

    } catch (Exception $ex) {
        return response()->json (
            [
                'result' => [
                    'status' => false , 
                    'message' => $ex -> getMessage(),
                ]
                ],
                500
            );
    }
   }

}
