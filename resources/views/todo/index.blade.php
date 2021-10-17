@extends('layouts.web')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Todo List</h1>
</div>


<div class="container-fluid">
    <div class="row">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between justify-content-center">
                        <h6 class="card-title">Todos</h6>
                        <a href="{{ route('todo.create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Make as done</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($todos as $key => $todo)

                            <tr>
                                <td>{{ ++ $key }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark">not done</span>
                                </td>
                                <td>
                                    <form action="{{ route('todo.done', [$todo->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex justify-content">
                                        <div class="" style="margin-right:5px">
                                            @if ($todo->status == 0)
                                                <a href="{{ route('todo.edit', [$todo->id]) }}"><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button></a>
                                            @else
                                                <a href="{{ route('todo.edit', [$todo->id]) }}"><button type="submit" disabled class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button></a>
                                            @endif
                                        </div>
                                        <div class="">
                                            <form action="{{ route('todo.destroy', [$todo->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ml-3" onclick="alert('Do you want to delete?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="6">
                                    <span class="text-danger">No record found!</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between justify-content-center">
                        <h6 class="card-title">Complete</h6>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($complete as $key => $com)

                            <tr>
                                <td>{{ ++ $key }}</td>
                                <td>{{ $com->title }}</td>
                                <td>{{ $com->description }}</td>
                                <td>
                                    <span class="badge bg-success text-white">done</span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content">
                                        <div class="">
                                            <form action="{{ route('todo.destroy', [$com->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ml-3" onclick="alert('Do you want to delete?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <span class="text-danger">No record found!</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
