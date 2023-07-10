@extends('layouts.app')
@section('title')
Add New Book
@endsection

@section('content')
<form action="{{route('books.update', ['book' => $book])}}" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control"  value="{{$book->title ? $book->title:old('title')}}">
        @error('title')
        <div class="text-small text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control"  value="{{$book->author ? $book->author:old('author')}}">
        @error('author')
        <div class="text-small text-danger">
            {{$message}}
        </div>
        @enderror

    </div>
    <div>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control"  value="{{$book->isbn ? $book->isbn:old('isbn')}}">
        @error('isbn')
        <div class="text-small text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control"  value="{{$book->price ? $book->price:old('price')}}">
        @error('price')
        <div class="text-small text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <label for="available">Availabe</label>
        <input type="text" name="available" id="available" class="form-control"  value="{{$book->available ? $book->available:old('available')}}">
        @error('available')
        <div class="text-small text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div  class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('books.index')}}" class="btn btn-info">Cancel</a>
    </div>
</form>
    

@endsection