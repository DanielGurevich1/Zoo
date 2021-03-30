@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:brown;">Edit managers</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-line">

                            <form method="POST" action="{{route('manager.update', [$manager])}}">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="manager_name" class="form-control" value="{{old('manager_name',$manager->name)}}">
                                    <small class="form-text text-muted">You can edit the name </small>
                                </div>
                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" name="manager_surname" class="form-control" value="{{old('manager_surname',$manager->surname)}}">
                                    <small class="form-text text-muted">You can edit the surname </small>
                                </div>
                                <div class="form-group">
                                    <label>Specie</label>
                                    {{-- <input type="text" name="manager_name" class="form-control" value="{{old('manager_surname',$manager->surname)}}"> --}}
                                    <select name="rusys_id">
                                        @foreach ($rusys as $rusys)
                                        <option value="{{$rusys->id}}" @if($rusys->id == $manager->rusys_id) selected @endif>{{$rusys->name}}</option>
                                        @endforeach
                                    </select>
                                    @csrf
                                    <small class="form-text text-muted">You can change the specie </small>
                                </div>


                                <div>


                                    <button type="submit" class="btn btn-outline-primary btn-sm">Edit</button>

                                </div>


                            </form>
                        </li>
                    </ul>


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
