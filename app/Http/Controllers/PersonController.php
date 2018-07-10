<?php

namespace App\Http\Controllers;

use App\Interfaces\IController;
use App\Services\PersonService;
use Exception;
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
                'name' => 'required|string',
                'document' => 'required|string',
                'born_date' => 'required|date',
                'gender' => 'required|string'
            ]);
            $personService = new PersonService(json_decode($request->getContent(), true));
            return response()->json([
                'person_id' => $personService->create(),
                'message' => 'Pessoa criado com sucesso!'
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
                'name' => 'required|string',
                'document' => 'required|string',
                'born_date' => 'required|date',
                'gender' => 'required|string'
            ]);
            $personService = new PersonService(json_decode($request->getContent(), true));
            return response()->json([
                'person_id' => $personService->update($id),
                'message' => 'Pessoa alterada com sucesso!'
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function retreave(Request $request)
    {
        // TODO: Implement retreave() method.
    }

    public function retreaveById($id, Request $request)
    {
        // TODO: Implement retreaveById() method.
    }

    public function delete($id, Request $request)
    {
        // TODO: Implement delete() method.
    }


}
