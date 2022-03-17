@extends('app')

@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                @method('PATCH')
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label class="form-label" for="name">Category-Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="color">Category-Color</label>
                    <input type="color" name="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
            <div>
                @if ($category->tasks->count() > 0)
                @foreach ($category->tasks as $task)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex aling-items-center">
                            <a href="{{ route('tasks-edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                @else
                <p>There are no tasks for this category</p>
                @endif
            </div>
        </div>
    </div>
@endsection