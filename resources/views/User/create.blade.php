@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class="panel-heading">   
                    <!--Crear alguna wea-->                
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'users.store']) !!}
                    @include('User.partials.form')
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection