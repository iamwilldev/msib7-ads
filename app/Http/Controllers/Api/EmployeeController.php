<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $employee = Employee::all();

            $employeeHireFirst = Employee::orderBy('date_of_hire', 'desc')->take(3)->get();
            $employeeWithCuti = Employee::has('cuti')->get();
            $employee->map(function ($employee) {
                $duration = $employee->cuti->where('start_date', '>=', now()->startOfYear())->sum('duration');
                $employee->remaining_cuti = 12 - $duration;
                return $employee;
            });

            return response(new DefaultResource(true, 'Employee list', [
                'employee' => EmployeeResource::collection($employee),
                'employee_hire_first' => EmployeeResource::collection($employeeHireFirst),
                'employee_with_cuti' => EmployeeResource::collection($employeeWithCuti),
            ]), 200);
        } catch (\Throwable $e) {
            return response(new DefaultResource(false, $e->getMessage(), []), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $request->validated();

            $employee = Employee::create($data);

            return response(new DefaultResource(true, 'Employee created', [
                'employee' => EmployeeResource::make($employee),
            ]), 201);
        } catch (\Throwable $e) {
            return response(new DefaultResource(false, $e->getMessage(), []), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        try {
            return response(new DefaultResource(true, 'Employee detail', [
                'employee' => EmployeeResource::make($employee),
            ]), 200);
        } catch (\Throwable $e) {
            return response(new DefaultResource(false, $e->getMessage(), []), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $data = $request->validated();

            $employee->update($data);

            return response(new DefaultResource(true, 'Employee updated', [
                'employee' => EmployeeResource::make($employee),
            ]), 200);
        } catch (\Throwable $e) {
            return response(new DefaultResource(false, $e->getMessage(), []), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();

            return response(new DefaultResource(true, 'Employee deleted', []), 200);
        } catch (\Throwable $e) {
            return response(new DefaultResource(false, $e->getMessage(), []), 500);
        }
    }
}
