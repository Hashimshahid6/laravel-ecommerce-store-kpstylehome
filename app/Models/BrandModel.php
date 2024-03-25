<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'brands';

    public function brand(){
        return self::select('brands.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=' , 'brands.created_by' )
        ->where('brands.status', '=', 1)
        ->where('brands.is_deleted', '=', 0)
        ->orderBy('brands.id', 'desc')
        ->paginate(2);
    }//
}
