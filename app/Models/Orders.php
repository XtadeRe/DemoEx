<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
      'title',
      'date',
      'buy_method',
      'user_id',
        'status'
    ];

    public function comment() {
        return $this->hasOne(Comments::class, 'order_id');
    }

}
