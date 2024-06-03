@extends('layouts.app')

@section('title')
    Category List
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Categories List') }}
                        <a href="{{ route('category.create') }}">
                            <button class="float-end btn btn-primary btn-sm">Create Category</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <a href="{{ route('category.memes.index', $category->id) }}">
                                                {{ $category->name }}
                                            </a>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                                <a style="margin-right: 2%" href="{{ route('category.edit', $category->id) }}">
                                                    <button class="btn btn-primary btn-sm">Edit</button>
                                                </a>

                                                <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
