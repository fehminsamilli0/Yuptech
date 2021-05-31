<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    public $timestamps = false;
    protected $casts = [
        'tag' => 'array'
    ];
    public function setPropertiesAttribute($value)
    {
        $tag = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item)) {
                $tag[] = $array_item;
            }
        }

        $this->attributes['tag'] = json_encode($tag);
    }
}
