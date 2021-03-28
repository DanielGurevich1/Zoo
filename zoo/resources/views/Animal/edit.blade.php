<form method="POST" action="{{route('animal.update', [$animal])}}">

    Nick: <input type="text" name="animal_nick" value="{{$animal->nick}}">

    <select name="rusys_id">
        @foreach ($rusys as $rusys)
        <option value="{{$rusys->id}}" @if($rusys->id == $animal->rusys_id) selected @endif>{{$rusys->name}}</option>
        @endforeach
    </select>
    Year: <input type="text" name="animal_year" value="{{$animal->year}}">
    Animal book: <textarea type="text" name="animal_book" value="{{$animal->animal_book}}"></textarea>
    <select name="manager_id">
        @foreach ($managers as $manager)
        <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif> {{$manager->name}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit" class="btn btn-outline-primary btn-sm">Edit</button>

</form>

{{-- <form method="POST" action="{{route('book.update',[$book])}}">
Title: <input type="text" name="book_title" value="{{$book->title}}">
ISBN: <input type="text" name="book_isbn" value="{{$book->isbn}}">
Pages: <input type="text" name="book_pages" value="{{$book->pages}}">
About: <textarea name="book_about">{{$book->about}}"</textarea>
<select name="author_id">
    @foreach ($authors as $author)
    <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
        {{$author->name}} {{$author->surname}}
    </option>
    @endforeach
</select>
@csrf
<button type="submit">EDIT</button>
</form> --}}
