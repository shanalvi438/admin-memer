<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemeResource;
use App\Models\Asset\Category;
use App\Models\Meme;
use Illuminate\Http\Request;

class MemesController extends Controller
{
    public function categoryMemes(Category $category)
    {
        $memes = $category->memes()->paginate(10);
        $response = MemeResource::collection($memes);

        return $this->sendResponse($response);
    }

    public function searchByName(Request $request)
    {
        $memes = Meme::Where('title','like',"%{$request->title}%")->get();
        $response = MemeResource::collection($memes);

        return $this->sendResponse($response);
    }
}
