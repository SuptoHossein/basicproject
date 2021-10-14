<div>
    <a href="{{ route('practice.index') }}">Go back</a>
</div>

<div>
    <table>
        <form action="{{ route('practice.update', [$practice->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" value="{{ $practice->name }}"></td>
            </tr>
            <tr>
                <td>Description : </td>
                <td><textarea id="" cols="30" rows="10" name="description" placeholder="Enter Description">{{ $practice->description }}</textarea></td>
            </tr>
            <tr>
                <td>Price : </td>
                <td><input type="number" name="price" value="{{ $practice->price }}"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Update"></td>
            </tr>
        </form>
    </table>
</div>
