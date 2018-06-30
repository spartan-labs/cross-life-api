<?php

namespace App;

class CustomData extends Entity
{
    protected $fillable = [
        'key',
        'value',
        'path'
    ];
}