<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_post extends Model
{
    use HasFactory;

    public function findAll(){
        return $this->all();
    }
    public function findById($id){
        return $this->find($id);
    }
}
