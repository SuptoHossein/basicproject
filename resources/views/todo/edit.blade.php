@extends('layouts.web')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between justify-content-center">
                        <h6 class="card-title">Create todo</h6>
                        <a href="{{ route('todo.index') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <x-validation-display/>

                    <form action="{{ route('todo.update', [$todo->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $todo->title }}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3" placeholder="Description here">{{ $todo->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
