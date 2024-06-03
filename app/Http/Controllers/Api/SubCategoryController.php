<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\Asset\Category;
use App\Models\Asset\SubCategory;

class SubCategoryController extends Controller
{
    public function index(Category $category)
    {
        $sub_categories = $category->subCategories()->paginate(10);;
        $response = SubCategoryResource::collection($sub_categories);

        return $this->sendResponse($response);
    }
}
