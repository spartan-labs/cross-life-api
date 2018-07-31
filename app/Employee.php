<?php

namespace App;

class Employee extends Entity
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function person()
    {
        return $this->hasOne(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
