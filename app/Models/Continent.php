<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'population',
        'density',
    ];

    protected $hidden = [
        'updated_at',
    ];

    protected $casts =[
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeSearch($q, $value)
    {
        return $q->where(function($query) use ($value) {
            $query->where('name', 'like', '%' . $value . '%')
                    ->orWhere('population', 'like', '%' . $value . '%')
                    ->orWhere('area', 'like', '%' . $value . '%');
        });
    }
}
