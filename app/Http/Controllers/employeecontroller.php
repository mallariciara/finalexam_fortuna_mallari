<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {
        $employee = employee::all();
        return view ('employee.index', compact('employee'));
    }


    public function create()
    {
        return view('employee.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'contact' => 'required',
        ]);

        employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    public function edit( int $id)
    {
        $employee = employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'contact' => 'required',
        ]);

        $employee = employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(int $id)
    {
      $employee = employee::findOrFail($id);
      $employee->delete();
      return redirect()->route('employee.index');
    }
}
