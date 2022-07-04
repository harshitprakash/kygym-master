@extends('layouts.admin.master')

@section('title', 'Payment Detail & Amount Confirmation')

@section('content')
    <form action="{{ route('online.payment.submit') }}" method="POST" >
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZORPAY_KEY') }}"
                data-amount="1000"
                data-buttontext="Pay 10 INR"
                data-name="Body Fitness Gym - Payment"
                data-description="Payment for the Diet Plan on the gym membership."
                data-image="http://bodyfitness.kygym.in/images/logo.png"
                data-prefill.name="Alok Kumar"
                data-prefill.email="alok@globaldesign.in"
                data-theme.color="#ff7529">
        </script>
    </form>
@endsection
