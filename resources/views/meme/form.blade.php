@extends('layouts.app')

@section('title')
    Meme
@endsection

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Memes') }}
                        <x-btn.back/>

                        <div class="card-body">

                            <form method="POST" action="{{ $data['route'] }}" enctype="multipart/form-data">
                                @csrf
                                @if ($data['method'] == 'PUT')
                                    @method('PUT')
                                @endif

                                <div>
                                    <p class="fs-4">{{ $category->category->name ?? ''}}</p>
                                </div>
                                <div class="form-group mb-2">

                                    @if($data['action'] =="Update")
                                        <p class="fs-5">{{ $meme->category->name ?? ''}}</p>
                                    @else
                                        <p class="fs-5">{{ $category->name ?? ''}}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-2">
                                    <label>Title</label>
                                    <input type="text" value="{{ $meme->title ?? '' }}" name=title class="form-control"
                                        placeholder="Title" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label>Tags</label>
                                    <input type="text"
                                           value="@if($meme ?? '') @foreach($meme->tags as $tag ){{$tag->name}},@endforeach @endif" name="tags" class="form-control"
                                           placeholder="Tags" multiple>
                                </div>
                                <div class="form-group mb-2">
                                    <label>Image</label>
                                    <input type="file" accept="image/*" name="image" class="form-control"
                                        {{ $data['method'] == 'POST' ? 'required' : '' }}>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary float-end">{{ $data['action'] }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
