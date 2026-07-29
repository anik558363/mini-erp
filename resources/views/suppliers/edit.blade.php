@extends('layouts.app')


@section('content')


<div class="container mt-4">


<h3>Edit Supplier</h3>


<div class="card">


<div class="card-body">


<form action="{{ route('suppliers.update',$supplier->id) }}"
      method="POST">


@csrf
@method('PUT')



<div class="mb-3">


<label class="form-label">
Supplier Name
</label>


<input type="text"
       name="name"
       class="form-control"
       value="{{ old('name',$supplier->name) }}">



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
       value="{{ old('phone',$supplier->phone) }}">



@error('phone')

<span class="text-danger">
{{ $message }}
</span>

@enderror


</div>




<button class="btn btn-primary">

    Update

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
