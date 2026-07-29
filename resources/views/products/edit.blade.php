@extends('layouts.app')

@section('content')


<div class="container mt-4">


<h3>Edit Product</h3>


<div class="card">

<div class="card-body">


<form action="{{ route('products.update',$product->id) }}"
method="POST">


@csrf
@method('PUT')



<div class="mb-3">

<label>
SKU
</label>

<input type="text"
name="sku"
class="form-control"
value="{{ old('sku',$product->sku) }}">


@error('sku')
<span class="text-danger">
{{ $message }}
</span>
@enderror


</div>





<div class="mb-3">

<label>
Product Name
</label>


<input type="text"
name="name"
class="form-control"
value="{{ old('name',$product->name) }}">


</div>





<div class="mb-3">

<label>
Unit
</label>


<input type="text"
name="unit"
class="form-control"
value="{{ old('unit',$product->unit) }}">


</div>





<div class="mb-3">

<label>
Current Stock
</label>


<input type="number"
name="current_stock"
class="form-control"
value="{{ old('current_stock',$product->current_stock) }}">


</div>





<button class="btn btn-primary">
Update
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
