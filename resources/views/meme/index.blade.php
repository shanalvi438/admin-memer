@extends('layouts.app')

@section('title')
    Memes List
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Memes List') }}
                        <a href="{{ route('category.memes.create',$category->id) }}">
                            <button class="float-end btn btn-primary btn-sm">Create Meme</button>
                        </a>
                        <div class="row">
                            @foreach ($memes as $meme)
                                <div class="col col-sm-4 col-4">
                                    <div class="card" style="width: 300px; height:300px; margin:4%;">
                                        <img src="{{ $meme->imageUrl ?? '' }}" style="height:170px;" class="card-img-top">
                                        <div class="card-body">
                                            <b>
                                                <h1 class="text-truncate fs-5">{{  $meme->category->name }}</h1>
                                            </b>

                                            <b>
                                                <h3 class="text-truncate fs-5">{{ $meme->title }}</h3>
                                            </b>
                                            <p>@foreach($meme->tags as $tag){{$tag->name}} @endforeach</p>

                                            <div style="margin-top: 3%;" class="d-flex flex-row bd-highlight mb-3">
                                                <a style="margin-right: 2%;"
                                                    href="{{ route('memes.show', $meme->id) }}"><button
                                                        class="btn btn-primary btn-sm">Show</button></a>
                                                <a style="margin-right: 2%;" href="{{ route('memes.edit', $meme->id) }}"><button
                                                        class="btn btn-primary btn-sm">Edit</button></a>
                                                <form method="POST" action="{{ route('memes.destroy', $meme->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        class="btn btn-danger btn-icon">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
