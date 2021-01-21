<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;



class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      return view('auth.userProfile.index')->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id){
      $validatedData = $request->validate([
        'nombre' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
      ]);
      $user = User::findOrFail($id);
      if ($request->email !== $user->email) {
        $validatedEmail = $request->validate([
          'email' => ['unique:users'],
        ]);
      }
      // dd($request->nombre);
      $user->name = $request->nombre;
      $user->email = $request->email;
      $status = 'La información del usuario ha sido actualizada.';
      $user->save();
      return back()->with(compact('status', 'user'));
    }

    public function updatePW(Request $request, $id){
      $validatedData = $request->validate([
        'nuevaContraseña' => 'required|confirmed', 'min:8',
      ]);
      $user = User::findOrFail($id);
      // dd($request->nombre);
      if (Hash::check($request->contraseña, $user->password)) {
        $user->password = Hash::make($request->nuevaContraseña);
        $status = 'La contraseña ha sido actualizada.';
        $user->save();
      }else {
        $status = 'La contraseña actual es incorrecta.';
      }
      return back()->with(compact('status', 'user'));
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
