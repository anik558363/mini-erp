@extends('layouts.app')


@section('content')


<div class="container mt-4">


    <h3>Edit Employee</h3>



    <div class="card">


        <div class="card-body">


            <form action="{{ route('employees.update',$employee->id) }}"
                  method="POST">


                @csrf

                @method('PUT')



                <div class="mb-3">


                    <label class="form-label">
                        Department
                    </label>



                    <select name="department_id"
                            class="form-control">


                        @foreach($departments as $department)


                            <option value="{{ $department->id }}"

                            {{ $employee->department_id == $department->id ? 'selected' : '' }}>


                                {{ $department->name }}


                            </option>


                        @endforeach


                    </select>


                </div>




                <div class="mb-3">


                    <label class="form-label">
                        Employee Name
                    </label>



                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name',$employee->name) }}">


                </div>




                <div class="mb-3">


                    <label class="form-label">
                        Email
                    </label>



                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email',$employee->email) }}">


                </div>




                <button class="btn btn-primary">

                    Update

                </button>



                <a href="{{ route('employees.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>



            </form>


        </div>


    </div>


</div>


@endsection
