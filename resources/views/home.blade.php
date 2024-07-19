@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h3>Process EMI Data</h3>
                    <form action="{{ route('emi.process') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary">Process Data</button>
                    </form>

                    <h3 class="mt-3">Loan Details</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Client ID</th>
                                <th scope="col">Number of Payments</th>
                                <th scope="col">First Payment Date</th>
                                <th scope="col">Last Payment Date</th>
                                <th scope="col">Loan Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loanDetails as $loan)
                            <tr>
                                <td>{{ $loan->clientid }}</td>
                                <td>{{ $loan->num_of_payment }}</td>
                                <td>{{ $loan->first_payment_date }}</td>
                                <td>{{ $loan->last_payment_date }}</td>
                                <td>{{ $loan->loan_amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
