@extends('layouts.app')
@section('main')
    <div class="container col-md-4 mt-3">
        <h1 class="mb-3">New Category</h1>
        <form method="POST" action="/store_category" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Category : </label>
                <input type="text" class="form-control" name="categories" placeholder="Enter New Category">
            </div>
            @if ($errors->has('categories'))
                <p class="text-danger">{{ $errors->first('categories') }}</p>
            @endif
            <div class="mb-3">
                <label for="profile" class="form-label">Profile : </label>
                <input type="file" class="form-control" name="profile[]" multiple>
            </div>
            @if ($errors->has('profile'))
                <p class="text-danger">{{ $errors->first('profile') }}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
