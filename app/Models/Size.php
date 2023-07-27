<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'description',
    ];

    public static function updateOrCreateZize($request, $id = null){
        $sizes = explode(',', $request->name);
        Size::updateOrCreate(['id' => $id],[
           'name' => json_encode($sizes),
           'description' => $request->description,
        ]);
    }
}
