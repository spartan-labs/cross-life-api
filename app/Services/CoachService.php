<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/06/2018
 * Time: 15:46
 */

namespace App\Services;

use App\Interfaces\IService;

class CoachService extends Service implements IService
{
    private $person;
    private $curriculum;

    public function __construct(PersonService $person)
    {
        $this->person = $person;
    }


    public function create()
    {
        // TODO: Implement create() method.
    }

    public function retreaveById(int $id)
    {
        // TODO: Implement retreaveById() method.
    }

    public function retreave(array $filters, int $page)
    {
        // TODO: Implement retreave() method.
    }

    public function update(int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
