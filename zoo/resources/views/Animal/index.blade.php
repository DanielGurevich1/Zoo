@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">List of Animals</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($animals as $animal)
                        <li class="list-group-item list-line">
                            <div>
                                <h2>{{$animal->nick}}</h2> managed by {{$animal->animalManager->name}}
                            </div>
                            <div class="list-line__buttons">
                                <form method="get" action="{{route('animal.edit', [$animal])}}">
                                    <button style="{{route('animal.edit',[$animal])}}" class="btn btn-outline-primary btn-sm">Edit</button>
                                    @csrf
                                </form>
                                <form method="post" action="{{route('animal.destroy', [$animal])}}">

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    @csrf
                                </form>

                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
