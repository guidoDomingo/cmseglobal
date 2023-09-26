{{-- Initialize Selectize --}}
@section('page_styles')
    @parent
    <link rel="stylesheet" href="{{ asset('css/selectize/selectize.bootstrap3.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/estilos_commission.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/telegram.css') }}"/>
@append
@section('page_scripts')
    <script src="{{ asset('js/selectize/selectize.js') }}"></script>
@append