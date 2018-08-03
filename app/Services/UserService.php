<?php

namespace App\Services;

use App\User;
use Exception;

class UserService extends Service
{
    private $user;


    /**
     * UserService constructor.
     * @param null $user
     */
    public function __construct($user = null)
    {
        $this->user = $user;
    }


    /**
     * @return int
     * @throws Exception
     */
    public function create()
    {

        $user = new User($this->user);
        $user->password = bcrypt($user->password);
        $user->save();
        if ($user->id == null) {
            throw new Exception("Erro ao criar usuário", 500);
        }

        return $user->id;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function retreaveById(int $id)
    {
        $user = User::find($id);

        if ($user->id == null) {
            throw new Exception("Erro ao buscar usuario", 500);
        }

        return $user;
    }

    /**
     * @param array $filters
     * @param int $page
     * @return mixed
     */
    public function retreave(array $filters, int $page)
    {
        $user = new User();
        foreach ($filters as $filter => $key) {
            $user = $user->where($filter, 'like', $key . "%");
        }
        return $user->paginate(10, ['*'], 'page', $page);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function update(int $id)
    {
        $user = User::find($id);


        foreach ($this->user as $key => $value) {
            $user->$key = $value;
        }

        $user->save();
        if ($user->id == null) {
            throw new Exception("Erro ao editar usuário", 500);
        }

        return $user;
    }


    /**
     * @param int $id
     * @return bool|mixed
     * @throws Exception
     */
    public function delete(int $id)
    {
        $user = User::find($id);
        $result = true;
        if (!$user->delete()) {
            $result= false;
        }
        return $result;
    }

    public function login(UserService $user): ?UserService
    {
        return $user;
    }

}