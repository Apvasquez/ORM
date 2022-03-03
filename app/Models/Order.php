<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'precio',
        'fecha',
        'user_id',
        ];
        public function orders()
        {
            return $this->hasOne('App\Models\Order_Detail');
        }
        public function products()
        {
            return $this->hasMany('App\Models\Product');
        }
}
