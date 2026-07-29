@extends('layouts.app')

@section('content')

<div class="container mt-4">


    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Employees</h3>

        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            Add Employee
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

                        <th>Email</th>

                        <th>Department</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>



                <tbody>


                @forelse($employees as $employee)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $employee->name }}
                        </td>


                        <td>
                            {{ $employee->email }}
                        </td>


                        <td>
                            {{ $employee->department->name ?? 'N/A' }}
                        </td>



                        <td>


                            <a href="{{ route('employees.edit',$employee->id) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>




                            <form action="{{ route('employees.destroy',$employee->id) }}"
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

                        <td colspan="5" class="text-center">

                            No employees found

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


            {{ $employees->links() }}


        </div>

    </div>


</div>


@endsection
