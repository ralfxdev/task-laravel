@extends('app')

@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label class="form-label" for="name">Category-Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="color">Category-Color</label>
                    <input type="color" name="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">New Category</button>
            </form>
            <div>
                @foreach ($categories as $category)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex aling-items-center">
                            <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="d-flex aling-items-center gap-2">
                                <span class="color-container" style="background-color: {{ $category->color }}"></span>
                                {{ $category->name }}
                            </a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $category->id }}">Delete</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete the category <strong>{{ $category->name }}</strong>?<br> All tasks in the category will be removed.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection