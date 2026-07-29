@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<h2 class="mb-4">
    Dashboard
</h2>

<div class="row">

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h6>Total Products</h6>

                <h3>0</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h6>Total Suppliers</h6>

                <h3>0</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h6>Pending PR</h6>

                <h3>0</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h6>Approved PR</h6>

                <h3>0</h3>

            </div>

        </div>

    </div>

</div>

@endsection
