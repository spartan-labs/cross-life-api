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
    public function create(Request $req)
    {
        try {
            $req->validate([
                'email' => 'string|unique:users',
                'password' => 'required|string',
                'profile_picture' => 'required|string'
            ]);
            $userService = new UserService(JSON::decode($req->getContent(), true));
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

    public function update($id, Request $req)
    {
        try {
            $req->validate([
                'profile_picture' => 'string'
            ]);
//            dd($req->route('id'));
            $userService = new UserService(JSON::decode($req->getContent(), true));
            $userService->update((int)$req->route('id'));
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return null;
    }

    public function retreave(Request $req)
    {
        try {
            $userService = new UserService();
            $array = $req->all();
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

    public function delete($id, Request $req)
    {
        try {
            $userService = new UserService();
            return response()->json([
                $userService->delete((int)$req->route('id'))
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function retreaveById($id, Request $req)
    {
        try {
            $userService = new UserService();
            return response()->json([
                $userService->retreaveById($req->route('id'))
            ][0], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
