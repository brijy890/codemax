<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarInventory extends Model
{
    protected $fillable = ['model_id', 'total', 'sold'];
}
