<?php

namespace App\Repositories;


use App\Employee;
use App\Company;
use App\Repositories\Interfaces\IEmployeeRepository;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements IEmployeeRepository
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Employee::get())
                ->addColumn('action', 'modules.action_button_employee')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.index_employees');
    }

    public function create()
    {
        $companies = Company::all();

        return view('admin.add_employee', compact('companies'));
    }

    public function store($request)
    {
        DB::table('employees')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('employees.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        $companies = Company::all();
        $employee = Employee::whereId($id)->first();

        return view('admin.edit_employee', compact('employee', 'companies'));
    }

    public function update($request, $id)
    {
        DB::table('employees')->select('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }
}