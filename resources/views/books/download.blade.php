@extends('layouts.app')
@section('title')
Books
@endsection

@section('content')
    <!-- create a table for pdf download -->
    <table class="table table-striped table-bordered table-responsive-xl">
        <thead class="bg-dark text-white">
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Available</th>
        </thead>
        <!-- make the table body bordered -->
        <tbody class="border">
            @foreach($books as $book)
            <tr>
                <td class="border">{{$book->id}}</td>
                <td class="border">{{$book->title}}</td>
                <td class="border">{{$book->author}}</td>
                <td class="border">{{$book->isbn}}</td>
                <td class="border">{{$book->price}}</td>
                <td class="border">{{$book->available}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection