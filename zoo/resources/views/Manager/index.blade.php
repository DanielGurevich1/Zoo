@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:red;">List of Managers</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($managers as $manager)

                        <li class="list-group-item list-line">
                            <div>
                                <h2>{{$manager->name}} {{$manager->surname}}</h2> responsible for {{$manager->rusysManager->name}}
                            </div>
                            <div class="list-line__buttons">
                                <form method="get" action="{{route('manager.edit', [$manager])}}">
                                    <button style="{{route('manager.edit',[$manager])}}" class="btn btn-outline-primary btn-sm">Edit</button>
                                    @csrf
                                </form>
                                <form method="post" action="{{route('manager.destroy', [$manager])}}">

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    @csrf
                                </form>

                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
