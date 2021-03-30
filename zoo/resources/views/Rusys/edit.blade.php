@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 style="color:brown;">Edit a specie</h3>

                <div class="card-body">
                    <form method="POST" action="{{route('rusys.update',[$rusys->id])}}">

                        <div class="form-group">
                            <label>Change Name:</label>
                            <input type="text" name="rusys_name" class="form-control" value="{{$rusys->name}}">
                            <small class="form-text text-muted">Have a new specie name?</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">EDIT</button>
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
