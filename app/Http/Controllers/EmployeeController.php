<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Example: search employees by name
        $employees = Employee::where('name', 'like', "%{$query}%")->get();

        return view('employees.search-results', compact('employees', 'query'));
    }
}
