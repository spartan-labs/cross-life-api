<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/06/2018
 * Time: 16:17
 */

namespace App\Services;

use App\Interfaces\IService;
use ArrayObject;

class PlanService extends Service implements IService
{
    private $plan;

    /**
     * PlanService constructor.
     * @param array $days
     */
    public function __construct(array $days)
    {
        $this->days = new ArrayObject();
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
