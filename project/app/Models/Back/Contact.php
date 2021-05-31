<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    public $timestamps = false;
    protected $casts = [
        'sm' => 'array'
    ];
    public function setPropertiesAttribute($value)
    {
        $sm = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['name'])) {
                $sm[] = $array_item;
            }
        }

        $this->attributes['sm'] = json_encode($sm);
    }
}
