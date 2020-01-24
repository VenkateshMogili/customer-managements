<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\Customer;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = new Customer();
        $biodatas = $biodatas -> getData();
        return view('customers.index',compact('biodatas'))
            ->with('i',(request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inserting = new Customer();
        $insertion = $inserting->createUser($request);
        if($insertion==="done"){
            return redirect()->route('customers.index')
            ->with('success','New Biodata created successfully...');
        } else{
            return redirect()->route('customers.index')
            ->with('danger','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodatas = new Customer();
        $biodata = $biodatas->getUser($id);
        if($biodata){
        return view('customers.details',compact('biodata'));
        } else{
            return redirect()->route('customers.index')
            ->with('danger','Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodatas = new Customer();
        $biodata = $biodatas -> getUser($id);
        return view('customers.edit',compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $biodatas = new Customer();
        $biodata = $biodatas->editUser($request,$id);
        if($biodata==="done"){
            return redirect()->route('customers.index')
            ->with('success','Biodata edited successfully....');
        } else{
            return redirect()->route('customers.index')
            ->with('danger','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = new Customer();
        $deletion = $del->deleteUser($id);
        if($deletion==="done"){
        return redirect()->route('customers.index')
        ->with('success','Biodata Deleted Successfully...');
        } else{
            return redirect()->route('customers.index')
        ->with('danger','Something went wrong');
        }
    }
}
