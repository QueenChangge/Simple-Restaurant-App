@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="{{ route('food.update', [$food->id]) }}" method="post" enctype="multipart/form-data">
            
            @csrf
            {{ method_field('PUT') }}
                <div class="card">
                    <div class="card-header">Update Food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <div class="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control">
                            @error('description')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control">
                            @error('price')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                        </div>
                        {{-- <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="" class="form-control">
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"></option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" class="form-control">
                                <option value="" disabled selected>- Choose -</option>
                                @foreach(App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" @if($category->id==$food->category_id) selected @endif>{{ $category->name }}</option>
                                {{-- <option value="Admin"  selected>Admin</option>        
                                <option value="Student"  selected>Student</option>        
                                <option value="Select Role" disabled selected>Category</option>         --}}
                                @endforeach
                            </select>
                            @error('category')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <div class="alert">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


