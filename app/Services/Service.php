<?php

namespace App\Services;

/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 25/06/2018
 * Time: 21:49
 */

use App\Interfaces\IService;

/**
 * Interface IService
 * @package App\Interfaces
 */
abstract class Service implements IService
{
    protected $id;
    protected $createdBy;
    protected $updatedBy;
    protected $createdAt;
    protected $updatedAt;
    protected $tags;
    protected $customData;
}