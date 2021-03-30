@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Create Animal registry</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('animal.store')}}">
                        Nick: <input type="text" name="animal_nick" value="{{old('animal_name')}}">

                        <select name="rusys_id">
                            @foreach ($rusys as $rusys)
                            <option value="{{$rusys->id}}">{{$rusys->name}}</option>
                            @endforeach
                        </select>
                        Year: <input type="text" name="animal_year" value="{{old('animal_year')}}">
                        Animal book: <textarea type="text" id="summernote" name="animal_book"></textarea>
                        <select name="manager_id">
                            @foreach ($managers as $manager)
                            <option value="{{$manager->id}}">{{$manager->name}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">ADD</button>

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
