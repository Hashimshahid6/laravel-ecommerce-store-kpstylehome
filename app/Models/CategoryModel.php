<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function categories(){
        return self::select('category.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=' , 'category.created_by' )
        ->where('category.status', '=', 1)
        ->where('category.is_deleted', '=', 0)
        ->orderBy('category.id', 'desc')
        ->paginate(2);
    }//
}
