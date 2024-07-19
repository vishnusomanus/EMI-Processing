@extends('layouts.app')

@section('content')
<div class="container">
    <h1>EMI Details</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client ID</th>
                @foreach ($emiDetails->first() as $key => $value)
                    @if ($key != 'clientid')
                        <th>{{ $key }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($emiDetails as $emi)
            <tr>
                <td>{{ $emi->clientid }}</td>
                @foreach ($emi as $key => $value)
                    @if ($key != 'clientid')
                        <td>{{ number_format($value, 2) }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
