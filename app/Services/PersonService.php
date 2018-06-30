<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/06/2018
 * Time: 15:48
 */

namespace App\Services;

use App\Interfaces\IService;
use ArrayObject;

class PersonService extends Service implements IService
{
    private $name;
    private $document;
    private $type;
    private $addresses;

    /**
     * PersonService constructor.
     */
    public function __construct()
    {
        $this->addresses = new ArrayObject();
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

    /**
     * @param AddressService $address
     */
    public function addAddress(AddressService $address)
    {
        $this->addresses->append($address);
    }

    public function removeAddress(int $index)
    {
        $this->addresses->offsetUnset($index);
    }

    public function updateAddress(int $index, AddressService $address)
    {
        $this->addresses->offsetSet($index, $address);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document): void
    {
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param mixed $addresses
     */
    public function setAddresses($addresses): void
    {
        $this->addresses = $addresses;
    }
}
