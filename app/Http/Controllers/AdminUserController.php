<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User  = QueryBuilder::for(User::class)->where('role','!=','0')->get();   
        return view('admin.admin-user.view-admin-user', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Role  = QueryBuilder::for(Role::class)->get();   
        return view('admin.admin-user.create-admin-user', compact('Role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->status = 1;
        $User->password = Hash::make($request->password);
        $User->save();
        return redirect()->back()->with('success', 'user created successfully with role');
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
        $User  = QueryBuilder::for(User::class)->find($id);   
        $Role  = QueryBuilder::for(Role::class)->get();   
        return view('admin.admin-user.edit-admin-user', compact('Role','User'));
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
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->role = $request->role;
        $User->password = Hash::make($request->password);
        $User->save();
        return redirect()->back()->with('success', 'user updated successfully with role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id)->delete();
        return redirect()->back()->with('success', 'user deleted successfully');


    }
}
