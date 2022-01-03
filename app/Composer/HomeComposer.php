<?php

use App\Http\Controllers\Controller;
use App\Models\category_type;

class HomeComposer extends Controller{

    public function showCategory(){
        $catData = new category_type();
        return $catData->FindAll();
    }
}