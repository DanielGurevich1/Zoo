<form method="POST" action="{{route('manager.update', [$manager])}}">
    Name: <input type="text" name="manager_name" value="{{$manager->name}}">
    Surname: <input type="text" name="manager_surname" value="{{$manager->surname}}">

    <select name="rusys_id">
        @foreach ($rusys as $rusys)
        <option value="{{$rusys->id}}" @if($rusys->id == $manager->rusys_id) selected @endif>{{$rusys->name}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit" class="btn btn-outline-primary btn-sm">Edit</button>

</form>
