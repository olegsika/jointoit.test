<?php

namespace App\Repositories;


use App\Company;
use App\Notifications\SendEmail;
use App\Repositories\Interfaces\ICompanyRepository;

class CompanyRepository implements ICompanyRepository
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Company::get())
                ->addColumn('action', 'modules.action_button_companies')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.index_companies');
    }

    public function create()
    {
        return view('admin.add_company');
    }

    public function store($request)
    {
        $path = 'default.jpg';
        if($request->file()){
            $path = $request->file('logo')->store('', 'public');
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ]);
        $company->email = $request->email;
        $company->notify(new SendEmail());

        return redirect()->route('companies.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        $company = Company::whereId($id)->first();
        return view('admin.edit_company', compact('company'));
    }

    public function update($request, $id)
    {

        $path = $request->hidden_image;
        $logo = $request->file('logo');
        if($logo != ''){
            $path = $request->file('logo')->store('', 'public');
        }
        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        );

        Company::whereId($id)->update($form_data);

        return redirect()->route('companies.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->employees()->delete();
        $company->delete();

        return redirect()->route('companies.index');

    }
}