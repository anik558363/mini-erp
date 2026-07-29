<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{


    public function index()
    {
        $employees = Employee::with('department')
            ->latest()
            ->paginate(10);


        return view('employees.index', compact('employees'));
    }





    public function create()
    {
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }





    public function store(Request $request)
    {

        $validated = $request->validate([

            'department_id' => 'required|exists:departments,id',

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:employees,email',

        ]);



        Employee::create($validated);



        return redirect()
            ->route('employees.index')
            ->with('success','Employee created successfully.');

    }





    public function edit(Employee $employee)
    {

        $departments = Department::all();


        return view('employees.edit',
        compact('employee','departments'));

    }





    public function update(Request $request, Employee $employee)
    {

        $validated = $request->validate([

            'department_id' => 'required|exists:departments,id',

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:employees,email,' . $employee->id,

        ]);



        $employee->update($validated);



        return redirect()
            ->route('employees.index')
            ->with('success','Employee updated successfully.');

    }





    public function destroy(Employee $employee)
    {

        $employee->delete();


        return redirect()
            ->route('employees.index')
            ->with('success','Employee deleted successfully.');

    }


}
