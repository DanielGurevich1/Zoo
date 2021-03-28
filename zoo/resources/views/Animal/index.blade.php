@foreach ($animals as $animal)
{{$animal->animalRusys->name}} --> {{$animal->nick}} managed by {{$animal->animalManager->name}}
<a href="{{route('animal.edit',[$animal])}}">[edit]</a>
<form method="POST" action="{{route('animal.destroy', [$animal])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
