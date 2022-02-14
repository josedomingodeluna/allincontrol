<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Models\User;

use Auth, Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ])->assignRole($request->role);

        $notification = array(
            'message' => 'Usuario Registrado',
            'alert-type' => 'success'
        );
    
        return redirect()->route('user.index')->with($notification);
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
        $user = User::find($id);
        $selected = Role::find($user->role);
        $roles = Role::all();
        return view('user.edit', compact('user', 'selected', 'roles'));
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
        if($id == Auth::user()->id) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'current_password' => 'required',
                'password' => 'required|confirmed',
                'role' => 'required',
            ]);

            $hashedPassword = User::find(Auth::user()->id)->password;
            if(Hash::check($request->current_password, $hashedPassword)) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                $message = array(
                    'message' => 'Usuario actualizado',
                    'alert-type' => 'success'
                );
            }

            $user = User::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->assignRole($request->role);

            $notification = array(
                'message' => 'Usuario actualizado',
                'alert-type' => 'success'
            );
        
            return redirect()->route('user.index')->with($notification);
        } else {
            
                $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required|confirmed',
                    'role' => 'required',
                ]);
                
                    $user = User::find($id);
                    $user->password = Hash::make($request->password);
                    $user->save();
                $user = User::find($id);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                $user->assignRole($request->role);
    
                $notification = array(
                    'message' => 'Usuario actualizado',
                    'alert-type' => 'success'
                );
            
                return redirect()->route('user.index')->with($notification);
            }
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
        return redirect()->route('user.index')->with('deleted','yes');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
