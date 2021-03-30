@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Edit managers</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('manager.update', [$manager])}}">
                        Name: <input type="text" name="manager_name" value="{{old('manager_name',$manager->name)}}">
                        Surname: <input type="text" name="manager_surname" value="{{old('manager_surname',$manager->surname)}}">

                        <select name="rusys_id">
                            @foreach ($rusys as $rusys)
                            <option value="{{$rusys->id}}" @if($rusys->id == $manager->rusys_id) selected @endif>{{$rusys->name}}</option>
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
