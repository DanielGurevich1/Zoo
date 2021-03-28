@foreach ($managers as $manager)
{{$manager->name}} {{$manager->rusysManager->name}}<a href="{{route('manager.edit',[$manager])}}">[edit]</a>
<form method="POST" action="{{route('manager.destroy', [$manager])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
