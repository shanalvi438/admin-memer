@extends('layouts.app')

@section('title')
    Add On
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col d-flex flex-row bd-highlight mb-3">
                                <a style="margin-right: 2%;" href="{{ route('memes.edit', $meme->id) }}"><button
                                    class="btn btn-primary btn-sm">Edit</button></a>
                                <form method="POST" action="{{ route('memes.destroy', $meme->id) }}">
                                    @csrf
                                    @method('Delete')
                                    <button class="btn btn-danger btn-sm" type="submit" class="btn btn-danger btn-icon">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <center>
                                <img src="{{ $meme->imageUrl }}" style="width: 500px; height:300px; margin:1%;">
                            </center>
                            <br>
                                <h1 class="fs-4">{{ $meme->category->name }}</h1>
                            <b>
                                <h2 class="fs-4">{{ $meme->title }}</h2>
                            </b>
                            <div style="margin: 1%;">
                                <p class="fst-normal text-start">{!! $meme->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
