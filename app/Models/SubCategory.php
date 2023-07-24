<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
    ];

    public static function subcategoryUpdateOrCreate($request, $id = null){
        SubCategory::updateOrCreate(['id' => $id], [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }
}
