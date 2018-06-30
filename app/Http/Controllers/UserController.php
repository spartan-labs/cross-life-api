<?php

namespace App\Http\Controllers;

use App\Interfaces\IController;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use App\User;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class UserController extends Controller implements IController
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'email' => 'string|unique:users',
                'password' => 'required|string',
                'profile_picture' => 'required|string'
            ]);
            $userService = new UserService(json_decode($request->getContent(), true));
            return response()->json([
                'user_id' => $userService->create(),
                'message' => 'Usuário criado com sucesso!'
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'profile_picture' => 'string'
            ]);
            $userService = new UserService($request->object);
            $userService->update($id);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function retreave(Request $request)
    {
        try {
            $userService = new UserService();
            $array = $request->all();
            $page = 1;
            if (array_key_exists('page', $array)) {
                $page = $array['page'];
                unset($array['page']);
            }
            return response()->json([
                $userService->retreave($array, $page)], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $userService = new UserService();
            return response()->json([
                $userService->delete($id)], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function retreaveById($id, Request $request)
    {
        try {
            $userService = new UserService();
            return response()->json([
                $userService->retreaveById($id)][0], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

}