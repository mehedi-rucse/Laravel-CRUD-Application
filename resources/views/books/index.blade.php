@extends('layouts.app')
@section('title')
Books
@endsection

@section('content')
    <!-- create a search bar -->
    <form action="{{route('books.search')}}" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search books" >
            <div >
                <button class="btn btn-outline-secondary" type="submit" >Search</button>
            </div>
        </div>
    </form>
    <div class="mb-2">
        <a href="{{ route('books.create')}}" class="btn btn-success">Add Book </a>
        <a href="{{ route('books.download')}}" class="btn btn-info">Download </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="bg-dark text-white text-center">
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Available</th>
            <th>Actions</th>
        </thead>
        <tbody class="text-center">
            @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->available}}</td>
                <td class="d-flex justify-content-center"> 
                    <a href="{{route('books.show', $book->id)}}" class="ms-1 btn btn-sm btn-secondary">View</a>
                    <a href="{{route('books.edit', $book->id)}}" class="ms-1 btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('books.destroy', $book->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ms-1 btn btn-danger" onclick="return confirm('are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$books->links()}}
    </div>

@endsection