<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function  users()
    {
        return $this->hasOne('App\User', 'id', 'id_users');
    }
}
