<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User as User;

class UserController extends Controller
{
    //

    public function test(Request $req){
      return response()->json(['msg' => 'I think I work.'], 200);
    }

    public function login(Request $req){

      /*try{
      $req->validate([
        'email' => 'required',
        'password' => 'required'
      ]);
    }catch(Exception $e){
      return response()->json($e, 500);
    }*/

      $email = $req->input('email');
      $password = $req->input('password');

      $search = User::where('email', "=", $email)->first();

      if(count($search) > 0){
        $search = $search->makeVisible('password');
      }else{
        return response()->json(['msg' => 'Your account details were wrong.'], 404);
      }

      if($search->password == $password){
        try{
         $token = JWTAuth::fromUser($search);
       }catch(Exception $e){
         return response()->json(['err' => 'Failed to create token!'], 500);
       }

       return response()->json(['msg' => 'You were logged in.', 'token' => $token], 200);
      }
      return response()->json(['msg' => 'we died'], 500);

    }

    public function signup(Request $req){

      $req->validate([
        'email' => 'required|unique:users',
        'lastname' => 'required|max:15',
        'password' => 'required',
        'firstname' => 'max:15'
      ]);

      $email = $req->input('email');
      $password = $req->input('password');
      $lastname = $req->input('lastname');
      $firstname = $req->input('firstname');

      $user = new User();

      $user->email = $email;
      $user->password = bcrypt($password);
      $user->lastname = $lastname;
      $user->firstname = $firstname;

      $user->save();

      return response()->json(['You were saved.'], 200);

    }

}
/*$user = JWTAuth::parseToken()->toUser();

if(!$dbuser = User::find($user->pk_User)){
  return response()->json(['err' => 'User does not exist....'], 404);
}*/
