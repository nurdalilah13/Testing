<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Book</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('books.update', $book->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label for="name">Book Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
