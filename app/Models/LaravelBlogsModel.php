<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaravelBlogsModel extends Model
{
    use HasFactory;
    
    public function findAll(){
        return $this->all();
    }
}
