<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_type extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name'
    ];
    public function FindAll()
    {
        return $this::all();
    }
    public function FindById($data){
        foreach($data as $key => $value){
            return $this->where($key, $value)->get();
        }
        
    }
}
