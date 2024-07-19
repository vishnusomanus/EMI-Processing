@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loan Details</h1>
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
@endsection
