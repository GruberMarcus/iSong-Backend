<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song as Song;
use App\User as User;

class SongController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = JWTAuth::parseToken()->toUser();

      if(!$dbuser = User::find($user->pk_User)){
        return response()->json(['err' => 'User does not exist....'], 404);
      }
      $content = Song::with('User.id')->all();

      return response()->json(['msg' => 'Here are your songs.'], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = JWTAuth::parseToken()->toUser();

      if(!$dbuser = User::find($user->pk_User)){
        return response()->json(['err' => 'User does not exist....'], 404);
      }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = JWTAuth::parseToken()->toUser();

      if(!$dbuser = User::find($user->pk_User)){
        return response()->json(['err' => 'User does not exist....'], 404);
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = JWTAuth::parseToken()->toUser();

      if(!$dbuser = User::find($user->pk_User)){
        return response()->json(['err' => 'User does not exist....'], 404);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
