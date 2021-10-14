@extends('layouts.web')

@section('content')


<div>
    <h3>Todo List</h3>
    <a href="{{ route('todo.create') }}">Add New</a>
</div>

<table class="table table-striped table-sm ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @forelse ($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->title }}</td>
            <td>
                <a href=""><button type="submit" class="btn btn-primary btn-sm">Edit</button></a>
                <a href=""><button type="submit" class="btn btn-success btn-sm">Done</button></a>
            </td>
          </tr>
        @empty

        @endforelse



    </tbody>
  </table>
@endsection

