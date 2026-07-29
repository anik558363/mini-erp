@extends('layouts.app')

@section('content')

<div class="container mt-4">


<h3>Add Product</h3>


<div class="card">

<div class="card-body">


<form action="{{ route('products.store') }}" method="POST">

@csrf


<div class="mb-3">

<label class="form-label">
SKU
</label>

<input type="text"
name="sku"
class="form-control"
value="{{ old('sku') }}">


@error('sku')
<span class="text-danger">
{{ $message }}
</span>
@enderror


</div>



<div class="mb-3">

<label class="form-label">
Product Name
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
Unit
</label>


<input type="text"
name="unit"
class="form-control"
placeholder="pcs, kg, liter">


@error('unit')
<span class="text-danger">
{{ $message }}
</span>
@enderror


</div>





<div class="mb-3">

<label class="form-label">
Current Stock
</label>


<input type="number"
name="current_stock"
class="form-control"
value="{{ old('current_stock',0) }}">


@error('current_stock')
<span class="text-danger">
{{ $message }}
</span>
@enderror


</div>





<button class="btn btn-success">
Save Product
</button>


<a href="{{ route('products.index') }}"
class="btn btn-secondary">

Back

</a>



</form>


</div>

</div>


</div>


@endsection
