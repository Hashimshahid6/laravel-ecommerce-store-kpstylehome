<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function checkslug($slug){
        return self::where('slug', '=', $slug)->count();
    }//

    public function getProducts(){
        return self::select('products.*', 'users.name as created_by_name', 'category.name as category_name', 'sub_category.name as sub_category_name', 'brands.name as brand_name')
                    ->join('users', 'users.id', '=' , 'products.created_by')
                    ->join('category', 'category.id', '=' , 'products.category_id')
                    ->join('sub_category', 'sub_category.id', '=' , 'products.sub_category_id')
                    ->join('brands', 'brands.id', '=' , 'products.brand_id')
                    ->where('products.status', '=', 1)
                    ->where('products.is_deleted', '=', 0)
                    ->orderBy('products.id', 'desc')
                    ->paginate(20);
    }//
}
