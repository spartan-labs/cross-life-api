<?php
namespace App;

class Role extends Entity
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
