<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CompaniesController extends Controller
{
    public function index()
    {
        return view('companies.index');
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
}
