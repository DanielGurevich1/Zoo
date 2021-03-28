<form method="POST" action="{{route('manager.store')}}">
    Name: <input type="text" name="manager_name">
    Surname: <input type="text" name="manager_surname">

    <select name="rusys_id">
        @foreach ($rusys as $rusys)
        <option value="{{$rusys->id}}">{{$rusys->name}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit" class="btn btn-outline-primary btn-sm">ADD</button>

</form>
