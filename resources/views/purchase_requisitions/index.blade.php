@extends('layouts.app')


@section('content')


<div class="container mt-4">


    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Purchase Requisitions</h3>


        <a href="{{ route('purchase-requisitions.create') }}"
           class="btn btn-primary">

            Create PR

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

                        <th>PR No</th>

                        <th>Employee</th>



                        <th>Items</th>



                        <th>Action</th>
                    </tr>

                </thead>



                <tbody>


                @forelse($prs as $pr)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $pr->requisition_no }}
                        </td>



                        <td>
                            {{ $pr->employee->name }}
                        </td>



                        



                        <td>

                            {{ $pr->items->count() }}

                        </td>





                        <td>


@if($pr->status == 'pending')


<form action="{{ route('purchase-requisitions.approve',$pr->id) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('PUT')

    <button type="submit"
            class="btn btn-sm btn-success">

        Approve

    </button>

</form>



<form action="{{ route('purchase-requisitions.reject',$pr->id) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('PUT')

    <button type="submit"
            class="btn btn-sm btn-danger">

        Reject

    </button>

</form>



@elseif($pr->status == 'approved')


<span class="badge bg-success">
    Approved
</span>



@else


<span class="badge bg-danger">
    Rejected
</span>


@endif


</td>

                    </tr>



                @empty


                    <tr>

                        <td colspan="6" class="text-center">

                            No PR Found

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>



            {{ $prs->links() }}



        </div>


    </div>


</div>


@endsection
