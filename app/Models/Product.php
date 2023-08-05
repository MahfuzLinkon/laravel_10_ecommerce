<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'unit_id',
        'size_id',
        'color_id',
        'code',
        'name',
        'description',
        'price',
        'image',
        'short_description',
        'discount_price',
        'discount_percentage',
    ];

    public static function updateOrCreateProduct($request, $id = null)
    {
        $images = [] ;
        if ($request->image){
            for($i = 0; $i < count($request->image); $i++){
                $images[] = Helper::uploadImage($request->image[$i], 'backend/img/product/', $id !== null ? Product::find($id)->image : '', 600, 600);
            }
        }


        Product::updateOrCreate(['id' => $id],[
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'brand_id' =>$request->brand_id,
            'unit_id' =>$request->unit_id,
            'size_id' =>$request->size_id,
            'color_id' =>$request->color_id,
            'code' =>$request->code,
            'name' =>$request->name,
            'short_description' =>$request->short_description,
            'description' =>$request->description,
            'price' =>$request->price,
            'discount_percentage' =>$request->discount_percentage,
            'discount_price' =>$request->discount_price,
            'image' => $request->image !== null ? implode(',' , $images) : ($id !== null ? Product::find($id)->image : ''),
        ]);
    }

//    private static function multiImageUpload($request, $id){
//        $images = [];
//        for($i = 0; $i < count($request->image); $i++){
//            $images[] = Helper::uploadImage($request->image[$i], 'backend/img/product/', $id !== null ? Product::find($id)->image : '');
//        }
//        return $images;
//    }


    private function multiImageUpload($request){

    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Product Count
    public static function subcategoryProductCount($subcategoryId)
    {
        return Product::where('subcategory_id', $subcategoryId)->where('status', 1)->count();
    }
    public static function brandProductCount($brandId)
    {
        return Product::where('brand_id', $brandId)->where('status', 1)->count();
    }

}
