<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('is-admin'))
        {
            $data['users'] = User::paginate(10);
        }
        else
        {
            $data['users'] = User::where('role', 'staff')->paginate(10);
        }
        

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::all();

        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //$validatedData = $request->validated();
        //$user = User::create($validatedData);

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only('name','email','password','password_confirmation'));

        $user->roles()->sync($request->roles);

        // Notify users of their newly created account and prompt them to create their new password
        Password::sendResetLink($request->only(['email']));
        return redirect()->back()->with('success', 'User successfully added to the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user']  = User::find($id);

        if ($data['user'])
        {
            $data['roles'] = Role::all();

            return view('admin.user.show', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! User not found');
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
        $data['user']  = User::find($id);

        if ($data['user'])
        {
            $data['roles'] = Role::all();

            return view('admin.user.edit', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Ooops! User not found');
        }
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
        $user = User::find($id);

        if ($user)
        {
            $validatedData = $request->validate([
                'name'  => 'required',
                'email' => 'required|email'
            ]);

            $user->update($validatedData);

            $user->roles()->sync($request->roles);

            return redirect()->back()->with('success', 'User details successfully updated');
        }
        else
        {
            return redirect()->back()->with('error', 'User details was not successfully updated');
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
        User::destroy($id);

        return redirect()->back()->with('success', 'User successfully removed from the system');
    }
}
