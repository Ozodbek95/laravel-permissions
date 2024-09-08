<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->where('name', '!=', 'super-user')->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $newRole = Role::create([
            'name' => $request->name
        ]);

        $permissions = Permission::query()->whereIn('id', $request->permissions)->get();

        $newRole->syncPermissions($permissions);

        return redirect()->route('roles')->with('success', 'Successfully added role.');
    }

    public function edit($id)
    {
        $role = Role::where('name', '!=', 'super-user')->findOrFail($id);

        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update($id, Request $request)
    {
        $role = Role::query()->where('name', '!=', 'super-user')->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $role->update($request->all());

        $permissions = Permission::query()->whereIn('id', $request->permissions)->get();

        $role->syncPermissions($permissions);

        return redirect()->route('roles')->with('success', "Successfully updated role. {$role->name}");
    }

    public function destroy($id)
    {
        $role = Role::findById($id);

        $role->delete();

        return redirect()->route('roles')->with('success', "Successfully deleted role. {$role->name}");
    }
}
