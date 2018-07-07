<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class PersonController extends Controller implements IController
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function create(Request $request)
    {
        try {
            $request->validate([
                'email' => 'string|unique:users',
                'password' => 'required|string',
                'profile_picture' => 'required|string'
            ]);
            $personService = new PersonService(json_decode($request->getContent(), true));
            return response()->json([
                'user_id' => $personService->create(),
                'message' => 'Usuário criado com sucesso!'
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function retreave($request)
    {
        // TODO: Implement retreave() method.
    }

    public function delete($request)
    {
        // TODO: Implement delete() method.
    }
}
