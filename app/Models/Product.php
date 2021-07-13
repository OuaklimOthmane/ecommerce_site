<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ProductsImage;

class Product extends Model
{
    //

    use Notifiable;

    protected $table = 'products';


    protected $fillable = [
        'maincategory_id', 'seller_id', 'name', 'code', 'color',  'price',  'discount', 'stock',
        'description', 'main_image', 'is_featured', 'status', 'created_at', 'updated_at'
    ];

    // protected $hidden = [ 'remember_token'];


    public function scopeActive($query)
    {

        return $query->where('status', 1);
    }
    public function scopeIsFeatured($query)
    {

        return $query->where('is_featured', 'Yes');
    }

    public function getMainImageAttribute($val)
    {
        return ($val !== null) ? asset('public/assets/' . $val) : "";
    }


    public function scopeSelection($query)
    {
        return $query->select(
            'id',
            'maincategory_id',
            'seller_id',
            'name',
            'code',
            'color',
            'price',
            'discount',
            'description',
            'main_image',
            'is_featured',
            'status',
            'stock'
        );
    }


    public function seller()
    {

        return $this->belongsTo('App\Models\Seller', 'seller_id', 'id');
    }
    public function maincategory()
    {

        return $this->belongsTo('App\Models\maincategory', 'maincategory_id', 'id');
    }


    public function getActive()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function productImages()
    {
        return $this->hasMany(ProductsImage::class, 'product_id', 'id');
    }
}
