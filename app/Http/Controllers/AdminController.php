<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    // public $paginator_max = 25;
    // public function __construct()
    // {
    //   $paginator_max = $this->$paginator_max;
    //
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $users = User::paginate(25);
      $roles = Role::all();
      return view('admin.index')->with(compact('users', 'roles'));
    }

    public function filter(Request $request){
      if ($request->type === 'active') {
        if ($request->search !== null) {
          $users = User::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->paginate(25);
        } else {
          $users = User::paginate(25);
        }

      }elseif ($request->type === 'deleted') {
        if ($request->search !== null) {
          $users = User::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->onlyTrashed()
            ->paginate(25);
        } else {
          $users = User::onlyTrashed()->paginate(25);
        }
      }
      $selector = $request->type;
      $searched = $request->search;
      if ((int)$request->role !== 0) {
        $roleHolder = Role::findOrFail($request->role);
      }else {
        $roleHolder = null;
      }
      $roles = Role::all();
      return view('admin.index')->with(compact(
        'users',
        'selector',
        'searched',
        'roles',
        'roleHolder'
      ));
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
    public function destroy($id){
      $user = User::findOrFail($id);
      $user->delete();
      $users = User::paginate(25);
      $roles = Role::all();
      return back()->with(compact('users', 'roles'));
    }

    public function restore($id){
      $user = User::onlyTrashed()->findOrFail($id);
      $user->restore();
      $users = User::paginate(25);
      $roles = Role::all();
      return back()->with(compact('users', 'roles'));
    }
}
