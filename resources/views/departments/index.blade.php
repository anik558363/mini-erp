@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Departments</h3>

        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            Add Department
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
                        <th>Department Name</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>


                <tbody>

                @forelse($departments as $department)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            {{ $department->name }}
                        </td>


                        <td>


                            <a href="{{ route('departments.edit',$department->id) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>



                            <form action="{{ route('departments.destroy',$department->id) }}"
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

                        <td colspan="3" class="text-center">

                            No departments found

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


            {{ $departments->links() }}


        </div>

    </div>


</div>


@endsection
