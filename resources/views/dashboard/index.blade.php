@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="container-fluid">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Dashboard
        </h2>

    </div>



    <div class="row g-4">


        <!-- Total Products -->

        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Products
                    </h6>


                    <h3 class="fw-bold text-primary">
                        {{ $totalProducts ?? 0 }}
                    </h3>


                </div>

            </div>

        </div>




        <!-- Total Suppliers -->

        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Suppliers
                    </h6>


                    <h3 class="fw-bold text-success">
                        {{ $totalSuppliers ?? 0 }}
                    </h3>


                </div>

            </div>

        </div>




        <!-- Pending PR -->

        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">


                    <h6 class="text-muted">
                        Pending PR
                    </h6>


                    <h3 class="fw-bold text-warning">
                        {{ $pendingPR ?? 0 }}
                    </h3>


                </div>

            </div>

        </div>




        <!-- Approved PR -->

        <div class="col-md-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">


                    <h6 class="text-muted">
                        Approved PR
                    </h6>


                    <h3 class="fw-bold text-info">
                        {{ $approvedPR ?? 0 }}
                    </h3>


                </div>

            </div>

        </div>



    </div>





    <!-- Recent Purchase Orders -->

    <div class="row mt-5">


        <div class="col-md-12">


            <div class="card shadow-sm border-0">


                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Recent Purchase Orders
                    </h5>

                </div>



                <div class="card-body">


                    <div class="table-responsive">


                        <table class="table table-bordered table-striped">


                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>PO No</th>

                                    <th>Supplier</th>

                                    <th>PR No</th>

                                    <th>Date</th>

                                </tr>

                            </thead>



                            <tbody>


                            @forelse($recentOrders ?? [] as $order)


                                <tr>


                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>
                                        {{ $order->po_no }}
                                    </td>


                                    <td>
                                        {{ $order->supplier->name ?? 'N/A' }}
                                    </td>


                                    <td>
                                        {{ $order->purchaseRequisition->requisition_no ?? 'N/A' }}
                                    </td>


                                    <td>
                                        {{ $order->order_date }}
                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td colspan="5" class="text-center">

                                        No Purchase Orders Found

                                    </td>

                                </tr>


                            @endforelse



                            </tbody>


                        </table>


                    </div>


                </div>


            </div>


        </div>


    </div>



</div>


@endsection
