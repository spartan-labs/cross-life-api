<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/06/2018
 * Time: 15:48
 */

namespace App\Services;

use App\Interfaces\IService;
use App\Person;
use ArrayObject;
use Exception;

class PersonService extends Service implements IService
{
    private $person;

    /**
     * PersonService constructor.
     */
    public function __construct($person = null)
    {
        $this->person = $person;
    }


    /**
     * @return bool|mixed
     * @throws Exception
     */
    public function create()
    {
        $person = new Person($this->person);
        $person->save();
        $result = true;
        if ($person->id == null) {
            $result = false;
            throw new Exception("Erro ao salvar pessoa");
        }
        return $result;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function retreaveById(int $id)
    {
        $person = Person::find($id);
        if ($person->id == null) {
            throw new Exception("Erro ao buscar pessoa", 500);
        }
        return $person;
    }

    public function retreave(array $filters, int $page)
    {
        $person = new Person();
        foreach ($filters as $filter => $key) {
            $person = $person->where($filter, 'like', $key . "%");
        }
        return $person->paginate(10, ['*'], 'page', $page);
    }

    public function update(int $id)
    {
        $person = Person::find($id);
        foreach ($this->person as $key => $value) {
            $person->$key = $value;
        }

        $person->save();
        if ($person->id == null) {
            throw new Exception("Erro ao editar pessoa", 500);
        }
    }

    public function delete(int $id)
    {
        $person = Person::find($id);
        $result = true;
        if (!$person->delete()) {
            $result= false;
        }
        return $result;
    }
}
