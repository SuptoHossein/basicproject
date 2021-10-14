<div>
    <a href="{{ route('practice.create') }}">Add new</a>
</div>

<div>
    @if (Session::has('msg'))
        <p style="background-color: green; padding:3px">{{ Session::get('msg') }}</p>
    @endif
</div>

<div>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Action</td>
        </tr>

            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('practice.show', [$item->id]) }}">Show</a>
                        <a href="{{ route('practice.edit', [$item->id]) }}">Edit</a>
                        <form action="{{ route('practice.destroy', [$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <p style="color: red">{{ "Data not found" }}</p>
                    </td>
                </tr>
            @endforelse


    </table>
</div>
