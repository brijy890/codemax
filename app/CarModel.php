<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['manufacturer_id', 'model_name', 'total', 'sold'];
}
