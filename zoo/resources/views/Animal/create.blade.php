<form method="POST" action="{{route('animal.store')}}">
    Nick: <input type="text" name="animal_nick">

    <select name="rusys_id">
        @foreach ($rusys as $rusys)
        <option value="{{$rusys->id}}">{{$rusys->name}}</option>
        @endforeach
    </select>
    Year: <input type="text" name="animal_year">
    Animal book: <textarea type="text" id="summernote" name="animal_book"></textarea>
    <select name="manager_id">
        @foreach ($managers as $manager)
        <option value="{{$manager->id}}">{{$manager->name}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit" class="btn btn-outline-primary btn-sm">ADD</button>

</form>
