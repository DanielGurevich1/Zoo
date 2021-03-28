<form method="POST" action="{{route('rusys.store')}}">
    Name: <input type="text" name="rusys_name">

    @csrf
    <button type="submit">ADD</button>
</form>
