@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Suppliers</h3>

        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
            Add Supplier
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>


                <tbody>

                @forelse($suppliers as $supplier)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $supplier->name }}
                        </td>


                        <td>
                            {{ $supplier->phone ?? 'N/A' }}
                        </td>


                        <td>

                            <a href="{{ route('suppliers.edit',$supplier->id) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>



                            <form action="{{ route('suppliers.destroy',$supplier->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')


                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>


                            </form>


                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            No suppliers found

                        </td>

                    </tr>

                @endforelse


                </tbody>


            </table>


            {{ $suppliers->links() }}


        </div>

    </div>


</div>


@endsection
