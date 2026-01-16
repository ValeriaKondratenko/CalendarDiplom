<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('organization.showOrganizations', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'contact'=> 'required',
            'address'=> 'required',
        ]);

        $organization = new Organization();
        $organization->fill($data);
        $organization->save();
        return redirect()->route('admin.organizations');
    }

    //вывод формы
    public function create()
    {
        $organization = new Organization();
        return view('organization.createOrganization', compact('organization'));
    }

    public function edit($id){
        $organization = Organization::findOrFail($id);

        return view('organization.editOrganization', compact('organization'));
    }

    public function update(Request $request, $id){
        $organization = Organization::findOrFail($id);

        $data = $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'contact'=> 'required',
            'address'=> 'required',
        ]);

        $organization->fill($data);
        $organization->save();
        return redirect()->route('admin.organizations');

    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {

    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        $organization = Organization::findOrFail($id);
        if($organization){
            $organization->delete();
        }
        return redirect()->route('admin.organizations');
    }



}
