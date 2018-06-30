<?php

namespace App\Services;

use App\Interfaces\IService;
use ArrayObject;

class StudentService extends Service implements IService
{
    private $plans;
    private $person;

    public function __construct()
    {
        $this->plans = new ArrayObject();
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

    public function addPlan(PlanService $plan)
    {
        $this->plans->append($plan);
    }

    public function removePlan(int $index)
    {
        $this->plans->offsetUnset($index);
    }

    public function updatePlan(int $index, PlanService $plan)
    {
        $this->plans->offsetSet($index, $plan);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param mixed $updatedBy
     */
    public function setUpdatedBy($updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * @param mixed $customData
     */
    public function setCustomData($customData): void
    {
        $this->customData = $customData;
    }

    /**
     * @return mixed
     */
    public function getPlans()
    {
        return $this->plans;
    }

    /**
     * @param mixed $plans
     */
    public function setPlans($plans): void
    {
        $this->plans = $plans;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person): void
    {
        $this->person = $person;
    }
}
