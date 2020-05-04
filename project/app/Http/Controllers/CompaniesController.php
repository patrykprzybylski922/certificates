<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CompaniesController extends Controller
{
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validator  = Validator::make( $request->all(), [
            'name' => 'required|min:3'
        ]);


        if ( $validator->fails() ) {
            return back()->withErrors($validator)
                ->withInput();
        }
        else {
            $company = new Company();
            $company->name = $request->input('name');
            $company->save();
            return redirect()->route('companies.index')->with('success','Company added successfully');
        }
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit',['company'=> $company]);
    }

    public function update(Request $request)
    {
        $validator  = Validator::make( $request->all(), [
            'name' => 'required|min:3'
        ]);


        if ( $validator->fails() ) {
            return back()->withErrors($validator)
                ->withInput();
        }
        else {
            $company = Company::find($request->input('id'));
            $company->name = $request->input('name');
            $company->save();
            return redirect()->route('companies.index')->with('success','Company updated successfully');
        }
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company deleted successfully');
    }
}
