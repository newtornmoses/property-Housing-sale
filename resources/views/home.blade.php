
<meta name="csrf-token" content="{{csrf_token()}}">
<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
@extends('layouts.master')

<hr>
{{-- <div class="logged">
        @if (Auth::check())
        <h6 class="logged">Your are logged in as: {{Auth::user()->name}}</h6>
          
        @endif
</div> --}}

@section('content')

<property-component></property-component>
@endsection




