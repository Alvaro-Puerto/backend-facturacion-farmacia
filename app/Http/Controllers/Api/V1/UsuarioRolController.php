<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioRolController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function store(int $id, Request $request) {
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($id);
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return response()->json("ok", 200);
        }

        $user->assignRole($role);
        return response()->json("", 200);
    }

    public function index(int $id )
    {
        $rol = Role::findOrFail($id);
        $users = User::all();

        $userWithRoles = $users->map(function ($user) use ($rol) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'updated_at'=> $user->updated_at,
                'assigned' => $user->hasRole($rol->name),
                '_attributes' => [
                    'checked' =>  $user->hasRole($rol->name)
                ]
            ];
        });

        return response()->json($userWithRoles);

    }
}
