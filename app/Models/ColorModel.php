<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    use HasFactory;
    protected $table = 'color'; 

    public function getColors(){
        return self::select('color.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=' , 'color.created_by' )
        ->where('color.status', '=', 1)
        ->where('color.is_deleted', '=', 0)
        ->orderBy('color.id', 'desc')
        ->paginate(2);
    }//
}
