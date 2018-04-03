<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
 
    public function index()
    {
        //
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'addressline'=>'required',
            'city' => 'required',
            'state' => 'required',
            'zip'   => 'required',
            'country' => 'required ', 
            'phone' => 'required',
        ]);

        Auth::user()->address()->create($request->all());

        return redirect()->route('checkout.payment');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
