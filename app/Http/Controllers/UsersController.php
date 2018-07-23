<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'      => 'required',
            'email'     => ['required', 'email', Rule::unique('users', 'email')]
        ]);

        $user = User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => bcrypt('password'),
        ]);

        $user->profile()->create([
            'avatar' => '/storage/avatars/danganronpa2.png',
        ]);

        flash('User Created Successfully')->success()->important();

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function makeAsAdmin(User $user)
    {
        $user->beAdmin();
    
        flash("User {$user->name} Be An Admin Successfully")->success()->important();

        return back();
    }

    public function revokePermissions(User $user)
    {
        $user->revokeAdmin();

        flash("User {$user->name} Revoked The Admin Permission Successfully")->success()->important();        

        return back();
    }
}
