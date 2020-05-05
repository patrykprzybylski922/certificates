<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertificatesController extends Controller
{
    public function index()
    {
        $certificates = DB::table('certificates')->paginate(10);
        return view('certificates.index', ['certificates' => $certificates]);
    }

    public function create()
    {
        return view('certificates.create');
    }

    public function store(Request $request)
    {
        $validator  = Validator::make( $request->all(), [
            'domain' => 'required',
            'importance' => 'required',
            'url' => 'required',
            'image' => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ]);


        if ( $validator->fails() ) {
            return back()->withErrors($validator)
                ->withInput();
        }
        else {
            $certificate = new Certificate();
            $certificate->company_id = $request->input('company');
            $certificate->domain = $request->input('domain');
            $certificate->url = $request->input('url');
            $certificate->importance = $request->input('importance');
            if($request->hasFile('image')){
                $image = $request->image;
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid().'.'.$ext;
                $image->storeAs('public/certs',$filename);
                Storage::delete("public/certs/{$certificate->image}");
                $certificate->image = $filename;
            }
            $certificate->save();
            return redirect()->route('certificates.index')->with('success','Certificate added successfully');
        }
    }

    public function edit($id)
    {
        $certificate = Certificate::find($id);
        return view('certificates.edit',['certificate'=> $certificate]);
    }

    public function update(Request $request)
    {
        $validator  = Validator::make( $request->all(), [
            'domain' => 'required',
            'importance' => 'required',
            'url' => 'required',
            'image' => 'nullable|image|max:1999', //formats: jpeg, png, bmp, gif, svg
        ]);


        if ( $validator->fails() ) {
            return back()->withErrors($validator)
                ->withInput();
        }
        else {
            $certificate = Certificate::find($request->input('id'));
            $certificate->company_id = $request->input('company');
            $certificate->domain = $request->input('domain');
            $certificate->url = $request->input('url');
            $certificate->importance = $request->input('importance');
            if($request->hasFile('image')){
                $image = $request->image;
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid().'.'.$ext;
                $image->storeAs('public/certs',$filename);
                Storage::delete("public/certs/{$certificate->image}");
                $certificate->image = $filename;
            }
            $certificate->save();
            return redirect()->route('certificates.index')->with('success','Certificate updated successfully');
        }
    }

    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success','Certificate deleted successfully');
    }
}
