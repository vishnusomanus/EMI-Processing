@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Process EMI Data</h1>
    <form action="{{ route('emi_details.process') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Process Data</button>
    </form>
</div>
@endsection
