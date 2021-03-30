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
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="manager_name" class="form-control">
                            <small class="form-text text-muted">You can edit the name </small>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="manager_surname" class="form-control">
                            <small class="form-text text-muted">You can edit the surname </small>
                        </div>

                        <div class="form-group">

                            <select name="rusys_id">
                                @foreach ($rusys as $rusys)
                                <option value="{{$rusys->id}}">{{$rusys->name}}</option>
                                @endforeach
                            </select>
                            @csrf


                        </div>
                        <div class="form-group">


                            <button type="submit" class="btn btn-outline-primary btn-sm">Create</button>
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
