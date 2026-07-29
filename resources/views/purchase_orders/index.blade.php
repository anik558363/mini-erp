@extends('layouts.app')

@section('content')

<div class="container mt-4">


    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Purchase Orders</h3>


        <a href="{{ route('purchase-orders.create') }}"
           class="btn btn-primary">

            Create PO

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
                        <th>PO No</th>
                        <th>PR No</th>
                        <th>Employee</th>
                        <th>Supplier</th>
                        <th>Order Date</th>

                    </tr>

                </thead>



                <tbody>


                @forelse($orders as $order)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $order->po_no }}
                        </td>


                        <td>
                           {{ $order->purchaseRequisition->requisition_no }}
                        </td>


                        <td>
                            {{ $order->requisition->employee->name ?? 'N/A' }}
                        </td>


                        <td>
                            {{ $order->supplier->name }}
                        </td>


                        <td>
                            {{ $order->order_date }}
                        </td>


                    </tr>



                @empty


                    <tr>

                        <td colspan="6" class="text-center">

                            No Purchase Orders Found

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>



            {{ $orders->links() }}


        </div>

    </div>


</div>


@endsection
