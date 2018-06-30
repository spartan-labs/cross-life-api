<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 25/06/2018
 * Time: 20:55
 */

namespace App\Interfaces;

use Illuminate\Http\Request;


interface IController
{
    public function create(Request $request);

    public function update($id, Request $request);

    public function retreave(Request $request);

    public function retreaveById($id, Request $request);

    public function delete($id, Request $request);
}