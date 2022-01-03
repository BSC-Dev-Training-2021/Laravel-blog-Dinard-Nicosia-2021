<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_post extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'content',
         'title',
          'description',
           'img_link',
            'created_by',
             'created',
              'updated'
    ];

    public function findAll()
    {
        return $this->all()->sortByDesc('id');
    }

    public function findById($data)
    {
        
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $result[] = $this->where($key, $value)->get();
            }
            return $result;
        }
        return $this->find($data);

    }

}
