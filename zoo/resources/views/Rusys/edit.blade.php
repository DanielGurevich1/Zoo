<form method="POST" action="{{route('rusys.update',[$rusys->id])}}">
    Name: <input type="text" name="rusys_name" value="{{$rusys->name}}">

    @csrf
    <button type="submit">EDIT</button>
</form>