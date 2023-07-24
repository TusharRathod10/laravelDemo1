@extends('layouts.app')
@section('main')
    <div class="container col-md-4 mt-3">
        <h1 class="mb-3">Edit Category</h1>
        <form method="POST" action="/update_category/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="category" class="form-label">Category : </label>
                <input type="text" class="form-control" name="categories" value="{{ $category->categories }}">
            </div>
            <div class="mb-3">
                <label for="profile" class="form-label">Profile : </label>
                <input type="file" class="form-control" name="profile[]" multiple>
                @php
                    $image = explode(',', $category->profile);
                @endphp
                @foreach ($image as $img)
                    <img src="{{ asset('assets/category/' . $img) }}" alt="image" srcset="" height="70px"
                        width="70px" class="m-2 p-1" style="border: 0.5px solid black">
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
