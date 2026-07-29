@extends('layouts.app')


@section('content')


<div class="container mt-4">


<h3>Add Supplier</h3>


<div class="card">

<div class="card-body">


<form action="{{ route('suppliers.store') }}" method="POST">

@csrf



<div class="mb-3">

<label class="form-label">
Supplier Name
</label>


<input type="text"
       name="name"
       class="form-control"
       value="{{ old('name') }}">



@error('name')

<span class="text-danger">
{{ $message }}
</span>

@enderror


</div>




<div class="mb-3">

<label class="form-label">
Phone
</label>


<input type="text"
       name="phone"
       class="form-control"
       value="{{ old('phone') }}">



@error('phone')

<span class="text-danger">
{{ $message }}
</span>

@enderror


</div>




<button class="btn btn-success">

    Save Supplier

</button>


<a href="{{ route('suppliers.index') }}"
   class="btn btn-secondary">

    Back

</a>


</form>


</div>

</div>


</div>


@endsection
