<?php

namespace App;

class Person extends Entity
{
    protected $fillable = [
        'name',
        'document',
        'type'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
