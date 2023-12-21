@extends('layouts.app')

@section('content')

<h1>Thank you for using our service! Redirecting you in 5 seconds...</h1>

<script>
    setTimeout(function(){
        window.location.href = "{{ $redirectUrl }}";
    }, 5000);
</script>

@endsection 
