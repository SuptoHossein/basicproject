@extends('layouts.web')

@section('content')



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

                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title here" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3" placeholder="Description here"></textarea>
                            {{-- <input type="text" class="form-control" name="description" placeholder="Title here" aria-describedby="emailHelp"> --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
