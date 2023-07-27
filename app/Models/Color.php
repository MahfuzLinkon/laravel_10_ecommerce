<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public static function updateOrCreateColor($request, $id = null){
        $colors = explode(',', $request->name);
        Color::updateOrCreate(['id'=>$id],[
           'name' => json_encode($colors),
        ]);
    }
}
