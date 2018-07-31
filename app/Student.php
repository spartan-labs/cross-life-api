<?php

namespace App;

class Student extends Entity
{
    protected $fillable = [
        'person_id',
        'plan_id',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function person() {
        return $this->hasOne(Person::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
