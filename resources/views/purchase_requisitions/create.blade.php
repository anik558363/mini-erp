@extends('layouts.app')


@section('content')


<div class="container mt-4">


<h3>Create Purchase Requisition</h3>



<div class="card">


<div class="card-body">


<form action="{{ route('purchase-requisitions.store') }}"
      method="POST">


@csrf



<div class="mb-3">


<label>
Employee
</label>


<select name="employee_id"
        class="form-control">


<option value="">
Select Employee
</option>



@foreach($employees as $employee)


<option value="{{ $employee->id }}">

{{ $employee->name }}
-
{{ $employee->department->name }}


</option>


@endforeach


</select>


</div>




<hr>


<h5>
Products
</h5>



<table class="table table-bordered"
       id="productTable">


<thead>

<tr>

<th>
Product
</th>


<th>
Quantity
</th>


<th>
Remarks
</th>


<th>
Action
</th>


</tr>


</thead>


<tbody>


<tr>


<td>


<select name="products[0][product_id]"
        class="form-control">


<option value="">
Select Product
</option>


@foreach($products as $product)


<option value="{{ $product->id }}">

{{ $product->name }}

</option>


@endforeach


</select>


</td>



<td>


<input type="number"
       name="products[0][quantity]"
       class="form-control"
       min="1">


</td>



<td>


<input type="text"
       name="products[0][remarks]"
       class="form-control">


</td>



<td>

<button type="button"
        class="btn btn-danger remove">

X

</button>


</td>


</tr>


</tbody>


</table>



<button type="button"
        class="btn btn-secondary"
        id="addRow">

Add Product

</button>



<button class="btn btn-success">

Save PR

</button>



</form>


</div>


</div>


</div>


<script>


let index = 1;


document.getElementById('addRow')
.onclick = function(){


let row = `

<tr>

<td>

<select name="products[${index}][product_id]"
class="form-control">


<option value="">
Select Product
</option>


@foreach($products as $product)

<option value="{{ $product->id }}">

{{ $product->name }}

</option>

@endforeach


</select>

</td>


<td>

<input type="number"
name="products[${index}][quantity]"
class="form-control"
min="1">

</td>


<td>

<input type="text"
name="products[${index}][remarks]"
class="form-control">

</td>


<td>

<button type="button"
class="btn btn-danger remove">

X

</button>

</td>


</tr>


`;


document.querySelector('#productTable tbody')
.insertAdjacentHTML('beforeend',row);


index++;

}




document.addEventListener('click',function(e){


if(e.target.classList.contains('remove')){


e.target.closest('tr').remove();


}


});


</script>



@endsection
