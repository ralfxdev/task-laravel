@extends('app')

@section('content')
    <div class= "container w-25 border p-4 mt-4">
        
        <form action="{{ route('tasks-update', ['id' => $task->id]) }}" method="POST">
            @method('PATCH')

            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label class="form-label" for="title">Task-Title</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection