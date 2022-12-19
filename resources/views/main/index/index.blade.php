@extends('layouts.main')

@section('content')
    <div class="container" id="app">
        <index-com cites="{{ json_encode($cites, true) }}"/>
    </div>
    {{-- <div id="app">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            <welcome/>
        </div>
    </div> --}}
@endsection
