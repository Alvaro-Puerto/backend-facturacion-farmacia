<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolPermisoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
       // $permission = Permission::findOrFail($request->permission_id);
        if ($role->hasDirectPermission($request->permission_id)) {
            $role->revokePermissionTo($request->permission_id);
            return response()->json("ok", 200);
        }
        $role->givePermissionTo($request->permission_id);

        return response()->json("ok", 200);
    }
}
