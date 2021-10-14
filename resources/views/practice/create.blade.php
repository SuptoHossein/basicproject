<div>
    <a href="{{ route('practice.index') }}">Go back</a>
</div>

<div>
    <table>
        <form action="{{ route('practice.store') }}" method="POST">
            @csrf
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" placeholder="Enter name"></td>
            </tr>
            <tr>
                <td>Description : </td>
                <td><textarea id="" cols="30" rows="10" name="description" placeholder="Enter Description"></textarea></td>
            </tr>
            <tr>
                <td>Price : </td>
                <td><input type="number" name="price" placeholder="Enter price"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Add"></td>
            </tr>
        </form>
    </table>
</div>
