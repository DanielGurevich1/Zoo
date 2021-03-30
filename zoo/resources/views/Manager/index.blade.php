@extends('layouts.app')
{{-- <img src="..." class="img-fluid" alt="Responsive image"> --}}

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="color:red;">List of Managers</h3>
                </div>
                <div class="card-body">

                    @foreach ($managers as $manager)
                    {{$manager->name}} {{$manager->surname}} responsible for {{$manager->rusysManager->name}}<a href="{{route('manager.edit',[$manager])}}">[edit]</a>
                    <form method="POST" action="{{route('manager.destroy', [$manager])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
