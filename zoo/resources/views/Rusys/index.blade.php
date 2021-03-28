@foreach ($rusys as $rusys)
{{$rusys->name}} {{$rusys->surname}}
<a href="{{route('rusys.edit',[$rusys])}}">[edit]</a><br>

<form method="POST" action="{{route('rusys.destroy', [$rusys])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>

@endforeach
