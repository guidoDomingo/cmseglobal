

@extends('app')

@section('title')
Error
@endsection

@section('content')

<div class="container" style="width:1000px;">
   
    <h1>Ocurrio un error, informar a los de sistema</h1>

    @if(isset($error_message))
        <div class="alert alert-danger">
            {{ $error_message }}
        </div>
    @endif

</div>


@endsection

@section('page_scripts')
@include('partials._selectize')
@endsection

@section('js')
    
@endsection

@section('aditional_css')
    
@endsection
