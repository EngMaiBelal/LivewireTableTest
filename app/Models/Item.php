<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
}
