@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Products</h3>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            Add Product
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Unit</th>
                        <th>Stock</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>


                <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $product->sku }}
                        </td>


                        <td>
                            {{ $product->name }}
                        </td>


                        <td>
                            {{ $product->unit }}
                        </td>


                        <td>
                            {{ $product->current_stock }}
                        </td>


                        <td>


                            <a href="{{ route('products.edit',$product->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>


                            <form action="{{ route('products.destroy',$product->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')


                                <button type="submit"
                                    onclick="return confirm('Are you sure?')"
                                    class="btn btn-sm btn-danger">

                                    Delete

                                </button>

                            </form>


                        </td>


                    </tr>


                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No products found
                        </td>
                    </tr>

                @endforelse


                </tbody>


            </table>


            {{ $products->links() }}


        </div>

    </div>


</div>

@endsection
