@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Create Animal registry</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <form method="POST" action="{{route('animal.store')}}">
                            {{-- Nick: <input type="text" name="animal_nick" value="{{old('animal_nick')}}"> --}}
                            <div class="form-group">
                                <label>Nick:</label>
                                <input type="text" name="animal_nick" class="form-control" value="{{old('animal_nick')}}">
                                <small class="form-text text-muted">You can choose a nick </small>
                            </div>
                            <div class="form-group">
                                <label>Year:</label>
                                <input type="text" name="animal_year" class="form-control" value="{{old('animal_year')}}">
                                <small class="form-text text-muted">You can choose a nick </small>
                            </div>
                            <div class="form-group">
                                <label>Animal book:</label>
                                <textarea type="text" id="summernote" name="animal_book"></textarea>
                                <small class="form-text text-muted">You can give a description </small>
                            </div>
                            <div class="form-group">
                                <label>Specie:</label>
                                <select name="rusys_id">
                                    @foreach ($rusys as $rusys)
                                    <option value="{{$rusys->id}}">{{$rusys->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Manager:</label>
                                <select name="manager_id">
                                    @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
                                    @endforeach
                                </select>
                                @csrf

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-sm">ADD</button>
                            </div>
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
