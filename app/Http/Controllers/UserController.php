<?php

namespace App\Http\Controllers;

use App\Interfaces\IController;
use App\Services\UserService;
use App\Utils\Json;
use Exception;
use Illuminate\Http\Request;

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
            $userService = new UserService(JSON::decode($request->getContent(), true));
            return response()->json([
                'user_id' => $userService->create(),
                'message' => __('messages.user-has-been-created')
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
//            dd($request->route('id'));
            $userService = new UserService($request->object);
            $userService->update((int)$request->route('id'));
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return null;
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
                $userService->retreave($array, $page)
            ], 200);

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
                $userService->delete($id)
            ], 200);

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
                $userService->retreaveById($request->route('id'))
            ][0], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
