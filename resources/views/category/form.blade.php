@extends('layouts.app')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Category') }}
                        <a href="{{ route('category.index') }}">
                            <button class="float-end btn btn-primary btn-sm">Category List</button>
                        </a>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ $data['route'] }}" enctype="multipart/form-data">
                            @csrf
                            @if ($data['method'] == 'PUT')
                                @method('PUT')
                            @endif
                            <div class="form-group mb-2">
                                <label>Category Name</label>
                                <input type="text" value="{{ $category->name ?? '' }}" name=name class="form-control"
                                    placeholder="Category Name" required>
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
@endsection
