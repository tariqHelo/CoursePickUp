<?php

namespace App\Http\Controllers;

use App\permission;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1) {
            $data = User::all();
            return view('dashbord.users.index', compact('data'));
        } else {
            $data = User::where('role', '!=', 1)->get();
            return view('dashbord.users.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashbord.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        //
        //New User :) 
        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $files = $request->file('image');
            $destinationPath = public_path() . "/users";
            $imgfile = '/users/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = 'null';
        }
        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'passToAdmin' => $request->password,
            'image' => $imgfile,
            'status' => 'Active',
        ];

        //Find New User.
        $findUser = User::latest('id')->first();
        $findUsers = $findUser->id + 1;
        //permission User .
        if ($request->role != 1) {
            $lead = [
                'userId' => $findUsers,
                'type' => 'Leads',
                'edit' => isset($request->lead[1]) ? "on" : "off",
                'create' => isset($request->lead[2]) ? "on" : "off",
                'delete' => isset($request->lead[3]) ? "on" : "off",
            ];
            $article = [
                'userId' => $findUsers,
                'type' => 'Articles',
                'edit' => isset($request->article[1]) ? "on" : "off",
                'create' => isset($request->article[2]) ? "on" : "off",
                'delete' => isset($request->article[3]) ? "on" : "off",
            ];
            $package = [
                'userId' => $findUsers,
                'type' => 'Packages',
                'edit' => isset($request->package[1]) ? "on" : "off",
                'create' => isset($request->package[2]) ? "on" : "off",
                'delete' => isset($request->package[3]) ? "on" : "off",
            ];
            $school = [
                'userId' => $findUsers,
                'type' => 'Schools',
                'edit' => isset($request->school[1]) ? "on" : "off",
                'create' => isset($request->school[2]) ? "on" : "off",
                'delete' => isset($request->school[3]) ? "on" : "off",
            ];
            $promotion = [
                'userId' => $findUsers,
                'type' => 'Promotions',
                'edit' => isset($request->promotion[1]) ? "on" : "off",
                'create' => isset($request->promotion[2]) ? "on" : "off",
                'delete' => isset($request->promotion[3]) ? "on" : "off",
            ];
            $site = [
                'userId' => $findUsers,
                'type' => 'Site',
                'edit' => isset($request->site[1]) ? "on" : "off",
                'create' => isset($request->site[2]) ? "on" : "off",
                'delete' => isset($request->site[3]) ? "on" : "off",
            ];
            $core = [
                'userId' => $findUsers,
                'type' => 'Core',
                'edit' => isset($request->core[1]) ? "on" : "off",
                'create' => isset($request->core[2]) ? "on" : "off",
                'delete' => isset($request->core[3]) ? "on" : "off",
            ];
            $user = [
                'userId' => $findUsers,
                'type' => 'Users',
                'edit' => isset($request->user[1]) ? "on" : "off",
                'create' => isset($request->user[2]) ? "on" : "off",
                'delete' => isset($request->user[3]) ? "on" : "off",
            ];
            // dd($user);
            permission::create($lead);
            permission::create($article);
            permission::create($package);
            permission::create($school);
            permission::create($promotion);
            permission::create($site);
            permission::create($core);
            permission::create($user);
        }
        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = User::find($id);

        return view('dashbord.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = User::find($id);
        $permission = permission::where('userId', $id)->get();
        return view('dashbord.users.edit', compact('data', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd(isset($request->user[2]) ? "on" : "off");
        $findThisUser = User::find($id);

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'email' => 'unique:users,email,' . $findThisUser->id,
            'username' => 'unique:users,username,' . $findThisUser->id,
        ]);
        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $files = $request->file('image');
            $destinationPath = public_path() . "/users";
            $imgfile = '/users/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = 'null';
        }

        //New User :) 
        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'passToAdmin' => $request->password,
            'image' => $imgfile,
            'status' => $findThisUser->status,
        ];

        //Find New User.

        //permission User .
        if ($request->role !== 1) {
            $lead = [
                'type' => 'Leads',
                'edit' => isset($request->lead[1]) ? "on" : "off",
                'create' => isset($request->lead[2]) ? "on" : "off",
                'delete' => isset($request->lead[3]) ? "on" : "off",
            ];
            $article = [
                'type' => 'Articles',
                'edit' => isset($request->article[1]) ? "on" : "off",
                'create' => isset($request->article[2]) ? "on" : "off",
                'delete' => isset($request->article[3]) ? "on" : "off",
            ];
            $package = [
                'type' => 'Packages',
                'edit' => isset($request->package[1]) ? "on" : "off",
                'create' => isset($request->package[2]) ? "on" : "off",
                'delete' => isset($request->package[3]) ? "on" : "off",
            ];
            $school = [
                'type' => 'Schools',
                'edit' => isset($request->school[1]) ? "on" : "off",
                'create' => isset($request->school[2]) ? "on" : "off",
                'delete' => isset($request->school[3]) ? "on" : "off",
            ];
            $promotion = [
                'type' => 'Promotions',
                'edit' => isset($request->promotion[1]) ? "on" : "off",
                'create' => isset($request->promotion[2]) ? "on" : "off",
                'delete' => isset($request->promotion[3]) ? "on" : "off",
            ];
            $site = [
                'type' => 'Site',
                'edit' => isset($request->site[1]) ? "on" : "off",
                'create' => isset($request->site[2]) ? "on" : "off",
                'delete' => isset($request->site[3]) ? "on" : "off",
            ];
            $core = [
                'type' => 'Core',
                'edit' => isset($request->core[1]) ? "on" : "off",
                'create' => isset($request->core[2]) ? "on" : "off",
                'delete' => isset($request->core[3]) ? "on" : "off",
            ];
            $user = [
                'type' => 'Users',
                'edit' => isset($request->user[1]) ? "on" : "off",
                'create' => isset($request->user[2]) ? "on" : "off",
                'delete' => isset($request->user[3]) ? "on" : "off",
            ];

            permission::where('id', $request->permissionLeads)->update($lead);
            permission::where('id', $request->permissionArticles)->update($article);
            permission::where('id', $request->permissionPackages)->update($package);
            permission::where('id', $request->permissionSchools)->update($school);
            permission::where('id', $request->permissionPromotions)->update($promotion);
            permission::where('id', $request->permissionSite)->update($site);
            permission::where('id', $request->permissionCore)->update($core);
            permission::where('id', $request->permissionUsers)->update($user);
        }
        User::where('id', $id)->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $thisUser = User::find($id);
        // dd($thisUser->status);
        if ($thisUser->status == "Active") {
            $data = [
                'status' => 'UnActive',
            ];
        } else {
            $data = [
                'status' => 'Active',
            ];

        }
        User::where('id',$id)->update($data);
        return redirect()->back();
    }

    /**
     * View Change Data of user in Authentication
     */
    public function profile()
    {
        # code...
        return view('auth.profile');
    }
    /**
     * Change Username and Name , Email, Image
     */
    public function changeProfile(Request $request)
    {
        // echo $im = $request->file('image');
        // echo '<br>';
        // echo  $im->getClientOriginalExtension();
        // dd($request->all());

        $id = Auth::user()->id;
        $findThisUser = User::find($id);
        // dd(Auth::user()->image);
        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $files = $request->file('image');
            $destinationPath = public_path() . "/users";
            $imgfile = '/users/' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = Auth::user()->image;
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'unique:users,email,' . $findThisUser->id,
            'username' => 'unique:users,username,' . $findThisUser->id
        ]);
        $user = User::findOrFail($id);

        $emailBefor = Auth::user()->email;

        if ($emailBefor == $request->email) {
            $user->email = $request->email;
        } else {
            request()->validate([
                'email' => "unique:users,email,$findThisUser->id,id",
            ]);
            $user->email = $request->email;
        }
        $user->image = $imgfile;
        $user->name = $request->name;
        $user->username = $request->username;
        // $user->image = $request->file('image');
        $user->save();

        return redirect()->back();
    }
    /**
     * User Update Password ...
     */
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate(
            [
                'password' => 'required|min:6',
                'confirmPassword' => 'required|same:password',
                'oldPassword' => 'required',
            ]
        );
        if (Hash::check($request->input('oldPassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
            $user->passToAdmin = $request->password;
            $user->save();
            return redirect()->back();
        } else {
            return back();
        }
        // User::where('id', Auth::user()->id)->update(Auth::user()->id);

    }
}
