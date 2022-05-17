<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $users = User::all();

        return view ('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::all();

        return view('users.create',  compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([

            'name'                  => 'required',
            'email'                 => 'required|unique:users|max:50',
            'roles'                 => 'required',
            'password'              =>  'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        $validated['password']              = bcrypt($validated['password'] );
        $validated['password_confirmation'] = bcrypt($validated['password_confirmation'] );

        $user                         = new User;
        $user->name                   = $request->input('name');
        $user->email                  = $request->input('email');
        $user->password               = Hash::make($request->input('password'));

        $user->assignRole($request->input('roles'));

        $user->save();

        return redirect()->route('users.index')->with('Success','User Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $id = $user->id;

        $this->authorize('view', User::find($id));

        $role = $user->roles->first()->name;

        return view('users.show', compact('user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', User::find($id));

        $user  = User::find($id);
        $roles = Role::all();

        return view('users.edit' , compact('user' ,'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|max:50',
            'roles'                 => 'required',
            'password'              => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8', 
        ]);

        $user                       = User::find($id);
        $user->name                 = $request->input('name');
        $user->email                = $request->input('email');
        $user->password             = Hash::make($request->input('password'));
       
        $user->syncRoles($request->input('roles'));
        $user->update();
    
        return redirect('users')->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Skill::class);

        User::destroy($id);

        return redirect('users')->with('success', 'User deleted!');
    }

}
