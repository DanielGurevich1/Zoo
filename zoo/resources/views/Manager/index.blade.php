@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}
{{-- @if($filterBy==0) selected @endif --}}
@section('content')
{{-- <div class="container-fluid"> --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">

                <form action="{{route('manager.index')}}" method="get" class="make-inline">
                    <div class="form-group make-inline">
                        <h2 style="color:red;">List of Managers</h2>
                        <select class="form-control" name="rusys_id">
                            <option value="0" disabled @if($filterBy==0) selected @endif>Select specie</option>

                            @foreach ($rusys as $rusys)
                            <option value="{{$rusys->id}}" @if($filterBy==$rusys->id) selected @endif> {{$rusys->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group make-inline">
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="sort" value="asc" @if($filterBy=='asc' ) checked @endif id="sortBy">
                            <label class="form-check-label" for="sortBy">asc</label>

                        </div>
                        <div class="form-check check">
                            <input class="form-check-input" type="radio" name="sort" value="desc" @if($filterBy=='desc' ) checked @endif id="sortByDesc">
                            <label class="form-check-label" for="sortByDesc">dsc</label>


                        </div>

                    </div>
                    <button type="submit" class="btn btn-info">Filter</button>
                    <a href="{{route('manager.index')}}" class="btn btn-info">Clear filter</a>
                </form>
            </div>
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
@endsection
