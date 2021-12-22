<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleModel extends Model
{
    use HasFactory;

    function dataDummy(){
        $data = array(
            'title' => 'This is Sample Title',
            'content' => 'This is Sample Content',
            'description' => 'description sample'
        );
        return $data;
    }
}
