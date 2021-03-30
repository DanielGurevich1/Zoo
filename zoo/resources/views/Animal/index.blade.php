@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">List of Animals</h3>
                </div>
                <div class="card-body">
                    @foreach ($animals as $animal)
                    {{$animal->animalRusys->name}} --> {{$animal->nick}} managed by {{$animal->animalManager->name}}
                    <a href="{{route('animal.edit',[$animal])}}">[edit]</a>
                    <form method="POST" action="{{route('animal.destroy', [$animal])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
