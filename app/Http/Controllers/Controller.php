<?php

namespace App\Http\Controllers;

use App\Models\category_type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $CategoryData;
    public function __construct()
    {
        $category = new category_type();
        $ctData =$category->FindAll();
        return $this->CategoryData = $ctData;
    }
}


