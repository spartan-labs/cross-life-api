<?php

namespace App\Http\Controllers;

use App\Interfaces\IController;
use App\Services\PersonService;
use Exception;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class PersonController extends Controller implements IController
{

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
                'gender' => 'required|string|in:male,female,other'
            ]);
            $personService = new PersonService(json_decode($request->getContent(), true));
            return response()->json([
                'person_id' => $personService->update($id),
                'message' => 'Pessoa alterada com sucesso!'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function retreave(Request $request)
    {
        try {
            $personService = new PersonService();
            $array = $request->all();
            $page = 1;
            if (array_key_exists('page', $array)) {
                $page = $array['page'];
                unset($array['page']);
            }
            return response()->json([
                $personService->retreave($array, $page)
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
            $personService = new PersonService();
            return response()->json([
                $personService->delete($id)
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
            $personService = new PersonService();
            return response()->json([
                $personService->retreaveById($id)
            ][0], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
