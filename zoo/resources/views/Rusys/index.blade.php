@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">List of species</h3>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($rusys as $rusys)

                        <li class="list-group-item list-line">

                            <div>
                                <h2>{{$rusys->name}}</h2>

                            </div>
                            <div class="list-line__buttons">
                                <form method="get" action="{{route('rusys.edit', [$rusys])}}">
                                    @csrf
                                    <button class="btn btn-success btn-sm" style="{{route('rusys.edit',[$rusys])}}">Edit</button>
                                </form>
                                <form method="post" action="{{route('rusys.destroy', [$rusys])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
</div>
@endsection
