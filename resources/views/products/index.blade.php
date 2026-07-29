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



    {{-- Search & Filter --}}

    <div class="card mb-3">

        <div class="card-body">


            <form method="GET" action="{{ route('products.index') }}">


                <div class="row g-2">


                    <div class="col-md-5">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search SKU, Product Name, Unit">

                    </div>



                    <div class="col-md-3">


                        <select name="stock_status" class="form-select">


                            <option value="">
                                All Stock
                            </option>


                            <option value="in_stock"
                                {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>

                                In Stock

                            </option>



                            <option value="out_of_stock"
                                {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>

                                Out of Stock

                            </option>


                        </select>


                    </div>




                    <div class="col-md-2">


                        <button type="submit" class="btn btn-primary w-100">

                            Search

                        </button>


                    </div>



                    <div class="col-md-2">


                        <a href="{{ route('products.index') }}"
                           class="btn btn-secondary w-100">

                            Reset

                        </a>


                    </div>



                </div>


            </form>


        </div>


    </div>





    {{-- Product Table --}}


    <div class="card">


        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-bordered table-striped">


                    <thead class="table-dark">


                        <tr>

                            <th>#</th>

                            <th>SKU</th>

                            <th>Name</th>

                            <th>Unit</th>

                            <th>Stock</th>

                            <th width="180">
                                Action
                            </th>

                        </tr>


                    </thead>




                    <tbody>



                    @forelse($products as $product)


                        <tr>


                            <td>
                                {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
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


                                @if($product->current_stock > 0)

                                    <span class="badge bg-success">
                                        {{ $product->current_stock }}
                                    </span>


                                @else

                                    <span class="badge bg-danger">
                                        Out of Stock
                                    </span>


                                @endif


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



            </div>




            {{-- Pagination --}}

            <div class="mt-3">

                {{ $products->links() }}

            </div>



        </div>


    </div>



</div>


@endsection
