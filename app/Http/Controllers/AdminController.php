<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.index')->with('users', $users);
    }

    public function filter(Request $request)
    {
      if ($request->type === 'active') {
        $users = User::all();
      }elseif ($request->type === 'deleted') {
        $users = User::onlyTrashed()->get();
      }
      $selector = $request->type;
      return view('admin.index')->with(compact('users', 'selector'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addRole(Request $request, $id)
    {
      $user = User::findOrFail($id);
      $role = Role::findOrFail($request->role);
      if (!$user->hasRoles($role->name)) {
        $user->roles()->attach($role);
      }
      $roles = Role::all();
      $status = 'El role del usuario ha sido actualizado.';
      return back()->with(compact('status', 'user'));
    }

    public function rmRole($id, $role_id)
    {
      $user = User::findOrFail($id);
      $role = Role::findOrFail($role_id);
      $user->roles()->detach($role);

      $roles = Role::all();
      $status = 'El role del usuario ha sido actualizado.';
      return back()->with(compact('status', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      $roles = Role::all();
      return view('admin.edit')->with(compact('user', 'roles'));
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
      // $user->update([
      //   'name'=>'michael',
      //   'email'=>$request->email,
      // ]);
      $user->name = $request->nombre;
      $user->email = $request->email;
      $user->save();
      $status = 'La información del usuario ha sido actualizada.';
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
      $user = User::findOrFail($id);
      $user->delete();
      $users = User::all();
      return back()->with('users', $users);
    }

    public function restore($id)
    {
      $user = User::onlyTrashed()->findOrFail($id);
      $user->restore();
      $users = User::all();
      return back()->with('users', $users);
    }
}
