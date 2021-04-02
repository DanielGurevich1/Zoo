@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

{{-- <img class="img_header" src="../public/img/header.png" alt="img_header"> --}}
{{-- <img src="../public/img/header.png" alt="img_header" class="img-fluid img-c"> --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">List of species</h3>
                    <a href="{{route('rusys.index', ['sort' => 'name'])}}">Sort by name</a>
                </div>

                <div class="card-body cd">
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
