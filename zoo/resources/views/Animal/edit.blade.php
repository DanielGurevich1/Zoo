@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Edit Animals</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('animal.update', [$animal])}}">

                        Nick: <input type="text" name="animal_nick" value="{{$animal->nick}}">

                        <select name="rusys_id">
                            @foreach ($rusys as $rusys)
                            <option value="{{$rusys->id}}" @if($rusys->id == $animal->rusys_id) selected @endif>{{$rusys->name}}</option>
                            @endforeach
                        </select>
                        Year: <input type="text" name="animal_year" value="{{$animal->year}}">
                        Animal book: <textarea id="summernote" type="text" name="animal_book" value="{{$animal->animal_book}}">{{$animal->animal_book}}</textarea>
                        <select name="manager_id">
                            @foreach ($managers as $manager)
                            <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif> {{$manager->name}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">Edit</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });

</script>

@endsection
