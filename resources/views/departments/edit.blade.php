@extends('layouts.app')


@section('content')


<div class="container mt-4">


    <h3>Edit Department</h3>


    <div class="card">


        <div class="card-body">


            <form action="{{ route('departments.update',$department->id) }}"
                  method="POST">


                @csrf

                @method('PUT')



                <div class="mb-3">


                    <label class="form-label">
                        Department Name
                    </label>


                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name',$department->name) }}">



                    @error('name')

                        <span class="text-danger">

                            {{ $message }}

                        </span>

                    @enderror


                </div>



                <button class="btn btn-primary">

                    Update

                </button>



                <a href="{{ route('departments.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>



            </form>


        </div>


    </div>


</div>


@endsection
