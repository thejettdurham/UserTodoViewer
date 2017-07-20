<?php

namespace UserTodo;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $incrementing = false;
    protected $table = 'users';
    protected $guarded = [];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
