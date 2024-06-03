<?php

namespace App\Http\Controllers;


use App\Http\Requests\MemeRequest;
use App\Models\Asset\Category;
use App\Models\Meme;

class MemeController extends Controller
{
    public function index(Category $category)
    {
        $memes = $category->memes()->latest()->get();

        return view('meme.index', compact('memes','category'));
    }

    public function create(Category $category)
    {
        $categories = Category::latest()->get();
        $data = [
            'method' => 'POST',
            'route' => route('category.memes.store',$category->id),
            'action' => __('Create'),
        ];

        return view('meme.form', compact('data', 'categories','category'));
    }

    public function store(MemeRequest $request, Category $category)
    {
        $meme = $category->memes()->create([
            'title' => $request->title,
        ]);

        if ($request->has('tags')) {
            $tags = preg_split("/[,]/",$request->tags);
            $meme->attachTags($tags);
        }

        $meme->addMedia($request->image)->toMediaCollection('image');

        return redirect()->route('category.memes.index',$category->id);
    }

    public function show(Meme $meme)
    {
        return view('meme.show', compact('meme'));
    }

    public function edit(Meme $meme)
    {
        $data = [
            'method' => 'PUT',
            'route' => route('memes.update', $meme->id),
            'action' => __('Update'),
        ];

        return view('meme.form', compact('data', 'meme', ));
    }

    public function update(MemeRequest $request, Meme $meme)
    {
        $meme->update([
            'title' => $request->title,
        ]);

        if ($request->image) {
            $meme->addMedia($request->image)->toMediaCollection('image');
        }

        return redirect()->route('category.memes.index',$meme->category_id);
    }

    public function destroy(Meme $meme)
    {
        $meme->media()->delete();
        $meme->delete();

        _removeUnnecessaryTags();

        return redirect()->back();
    }
}
