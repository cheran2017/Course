<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use App\Http\Requests\RolePermissionRequest;
class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Role   = QueryBuilder::for(Role::class)->get();
        return view('admin.role-permission.view-role-permission', compact('Role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PermissionGroup   = QueryBuilder::for(PermissionGroup::class)->get();
        return view('admin.role-permission.create-role-permission', compact('PermissionGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionRequest $request)
    {
        $Role       = new Role;
        $Role->name = $request->role;
        $Role->save();

        $Permission = $request->permission_id;
        $Role->permissions()->attach($Permission);
        return redirect()->back()->with('success', 'Role Permission successfully stored');
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
        $Role              = QueryBuilder::for(Role::class)->find($id);
        $PermissionGroup   = QueryBuilder::for(PermissionGroup::class)->get();
        $checkedPermission = collect($Role->permissions)->pluck('id')->toArray();
        return view('admin.role-permission.edit-role-permission', compact('Role','PermissionGroup','checkedPermission'));

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
        $Role       = Role::find($id);
        $Role->name = $request->role;
        $Role->save();

        $Permission = $request->permission_id;
        $Role->permissions()->sync($Permission);
        return redirect()->back()->with('success', 'Role Permission successfully updated');
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
