@extends('layouts.app')


@section('content')


<div class="container mt-4">


    <h3>Add Employee</h3>



    <div class="card">


        <div class="card-body">


            <form action="{{ route('employees.store') }}"
                  method="POST">


                @csrf



                <div class="mb-3">


                    <label class="form-label">
                        Department
                    </label>



                    <select name="department_id"
                            class="form-control">


                        <option value="">
                            Select Department
                        </option>



                        @foreach($departments as $department)


                            <option value="{{ $department->id }}">

                                {{ $department->name }}

                            </option>


                        @endforeach


                    </select>



                    @error('department_id')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror


                </div>




                <div class="mb-3">


                    <label class="form-label">
                        Employee Name
                    </label>



                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}">



                    @error('name')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror


                </div>




                <div class="mb-3">


                    <label class="form-label">
                        Email
                    </label>



                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">



                    @error('email')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror


                </div>




                <button class="btn btn-success">

                    Save Employee

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
