<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Entity extends Model
{
    protected $guarded = ['id', 'created_by', 'updated_by'];
    protected $primaryKey = 'id';

    public function createdBy()
    {
        return $this->hasOne('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function updatedBy()
    {
        return $this->hasOne('App\User');
    }

    public function scopeCreatedBy(Builder $query, int $userId)
    {
        return $query->where('created_by', $userId);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
