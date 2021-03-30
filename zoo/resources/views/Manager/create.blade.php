@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Manager registry</div>

                <div class="card-body">
                    <form method="POST" action="{{route('manager.store')}}">
                        Name: <input type="text" name="manager_name" value="{{old('manager_name')}}">
                        Surname: <input type="text" name="manager_surname" value="{{old('manager_surname')}}">

                        <select name="rusys_id">
                            @foreach ($rusys as $rusys)
                            <option value="{{$rusys->id}}">{{$rusys->name}}</option>
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
