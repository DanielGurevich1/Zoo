@extends('layouts.app')
<img src="..." class="img-fluid" alt="Responsive image">

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Create a specie</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('rusys.store')}}">

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="rusys_name" class="form-control">
                            <small class="form-text text-muted">Enter specie name</small>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">ADD</button>
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
