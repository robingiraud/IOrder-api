<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::query()->paginate(20);
        return response(CompanyResource::collection($companies));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->keywords = $request->keywords;

        if ($company->save()) {
            return response($company->id);
        } else {
            return response(['error' => 'Une erreur est survenue lors de  l\'ajout.']);
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
        $company = Company::with(['categories'])->findOrFail($id);
        return response(new CompanyResource($company));
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
        $company = Company::findOrFail($id);
        if ($request->name) $company->name = $request->name;
        if ($request->description) $company->description = $request->description;
        if ($request->latitude) $company->latitude = $request->latitude;
        if ($request->longitude) $company->longitude = $request->longitude;
        if ($request->keywords) $company->keywords = $request->keywords;

        return response($company->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        return response($company->delete());
    }
}
