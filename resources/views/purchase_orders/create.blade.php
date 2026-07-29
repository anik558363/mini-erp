@extends('layouts.app')


@section('content')


<div class="container mt-4">


<h3>Create Purchase Order</h3>



<div class="card">


<div class="card-body">


<form action="{{ route('purchase-orders.store') }}"
      method="POST">


@csrf



<div class="mb-3">


<label class="form-label">
Approved Purchase Requisition
</label>



<select name="requisition_id"
        class="form-control">


<option value="">
Select PR
</option>



@foreach($requisitions as $requisition)


<option value="{{ $requisition->id }}">


{{ $requisition->requisition_no }}

-
{{ $requisition->employee->name }}


</option>


@endforeach


</select>



@error('requisition_id')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>





<div class="mb-3">


<label class="form-label">
Supplier
</label>



<select name="supplier_id"
        class="form-control">


<option value="">
Select Supplier
</option>



@foreach($suppliers as $supplier)


<option value="{{ $supplier->id }}">


{{ $supplier->name }}


</option>


@endforeach


</select>



@error('supplier_id')

<span class="text-danger">

{{ $message }}

</span>

@enderror



</div>





<div class="mb-3">


<label class="form-label">
Order Date
</label>



<input type="date"
       name="order_date"
       class="form-control"
       value="{{ date('Y-m-d') }}">



@error('order_date')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>




<button class="btn btn-success">

Create PO

</button>



<a href="{{ route('purchase-orders.index') }}"
   class="btn btn-secondary">

Back

</a>



</form>


</div>


</div>


</div>


@endsection
