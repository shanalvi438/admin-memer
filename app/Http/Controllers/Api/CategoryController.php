<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Asset\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $response = CategoryResource::collection($categories);

        return $this->sendResponse($response);
    }
}
