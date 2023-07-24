<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];


    public static function updateOrCreateBrand($request, $id = null){
        Brand::updateOrCreate(['id'=>$id],[
            'name' => $request->name,
            'description' => $request->description,
            'image' => Helper::uploadImage($request->image, 'backend/img/brand/', $id !== null ? Brand::find($id)->image : ''),
        ]);
    }
}
