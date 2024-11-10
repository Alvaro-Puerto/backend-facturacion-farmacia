<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json(Role::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create($request->all());

        return response()->json('Rol creado correctamente', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $allPermissions = Permission::all();
        $permissionsWithStatus = $allPermissions->map(function ($permission) use ($role) {
            return [
                'permission' => $permission->name,
                'assigned' => $role->hasPermissionTo($permission->name),
                '_attributes' => [
                    'checked' =>  $role->hasPermissionTo($permission->name)
                ]
            ];
        });

        $data = [
            'role' => $role,
            'permissions' => $permissionsWithStatus
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $rol = Role::findOrFail($id);

        $rol->name = $request->name;
        $rol->save();
        return response()->json($rol);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
