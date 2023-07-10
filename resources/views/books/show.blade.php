@extends('layouts.app')
@section('title')
Books
@endsection

@section('content')

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">Author : {{$book->author}}</p>
            <p class="card-text">ISBN : {{$book->isbn}}</p>
            <p class="card-text">Price : {{$book->price}}</p>
            <p class="card-text">Available : {{$book->available}}</p>
            <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('books.index')}}" class="btn btn-secondary">Cancel</a>

        </div>
    </div>
@endsection