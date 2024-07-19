@extends('layouts.app')

@section('content')
<div class="container">
    <h1>EMI Details</h1>

    @if ($emiDetails->isEmpty())
        <div class="alert alert-info" role="alert">
            No EMI details available.
        </div>
    @else
    <div class="table-responsive">
        Swipe to see more >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Client ID</th>
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
    <div class="accordion" id="accordionExample">
        @foreach ($emiDetails as $emi)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $emi->clientid }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $emi->clientid }}" aria-expanded="true" aria-controls="collapse{{ $emi->clientid }}">
                    Client ID: {{ $emi->clientid }}
                </button>
            </h2>
            <div id="collapse{{ $emi->clientid }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $emi->clientid }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($emi as $key => $value)
                                @if ($key != 'clientid')
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ number_format($value, 2) }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
