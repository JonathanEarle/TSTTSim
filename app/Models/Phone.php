<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    public function setSpecsAttribute($value)
    {
        $specs = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['spec'])) {
                $specs[] = $array_item;
            }
        }

        $this->attributes['specs'] = json_encode($specs);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'prepaidcost' => 'float',
        'postpaidcost' => 'float',
        'specs' => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'model',
        'imageSrc',
        'specs',
        'prepaidcost',
        'postpaidcost',
    ];
}
