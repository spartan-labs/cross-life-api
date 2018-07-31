<?php

namespace App;

class Address extends Entity
{
    protected $fillable = [
        'street',
        'number',
        'neighborhood',
        'city',
        'cep',
        'country',
        'state'
    ];

    public function person() {
        return $this->belongsTo(Person::class);
    }
}
