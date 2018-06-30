<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 28/06/2018
 * Time: 20:23
 */

namespace App\Interfaces;


interface IService
{
    /**
     * @param IService $obj
     * @return mixed
     */
    public function create();

    /**
     * @param int $id
     * @return mixed
     */
    public function retreaveById(int $id);

    /**
     * @param array $filters
     * @return mixed
     */
    public function retreave(array $filters,int $page);

    /**
     * @param IService $obj
     * @return mixed
     */
    public function update(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

}