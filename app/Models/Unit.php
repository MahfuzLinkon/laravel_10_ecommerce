<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public static function updateOrCreateUnit($request, $id = null){
        Unit::updateOrcreate(['id'=>$id], [
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }






}
