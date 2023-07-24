<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];


    public static function categoryUpdateOrCreate($request, $id = null){
        Category::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'description' => $request->description,
            'image' => Helper::uploadImage($request->image, 'backend/img/category/', $id === null ? '' : Category::find($id)->image),
        ]);
    }






}
