@extends('layouts.app')
@section('main')
    <div class="container mt-3">
        <h1 class="mb-3 display-3">Category</h1>
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="alert alert-success my-2 px-5 py-2 position-absolute">
                    {{ session()->get('success') }}
                </div>
            </div>
        @endif
        @if (session('delete'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="alert alert-danger my-2 px-5 py-2 position-absolute">
                    {{ session('delete') }}
                </div>
            </div>
        @endif
        <a href="/add_category" class="btn btn-outline-success mb-3 mt-5 float-end">Add Category</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">C.Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->categories }}</td>
                        <td>
                            @php
                                $image = explode(',', $cat->profile);
                            @endphp
                            @foreach ($image as $img)
                                <img src="{{ asset('assets/category/' . $img) }}" alt="image" srcset="" height="70px"
                                    width="70px">
                            @endforeach
                        </td>
                        <td><a href="/edit_category/{{ $cat->id }}" class="btn btn-sm btn-primary">Edit</a></td>
                        <td>
                            <form action="/remove_category/{{ $cat->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end mt-2"> {{ $category->onEachSide(0)->links() }}</div>
    </div>
@endsection
