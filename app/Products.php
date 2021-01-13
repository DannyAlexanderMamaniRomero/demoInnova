<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
    	'id', 'codCategoria', 'nombreProducto','stock'
    ];
}
