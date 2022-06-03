<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateCompanyNotification;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('company.index')->with(['companies' => Company::orderBy('updated_at', 'DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $logoPublicStoragePath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $storagePathPrefix = "public/logos";
            $logoStoragePath = $logo->store($storagePathPrefix);
            $publicStoragePathPrefix = 'storage/logos';
            $logoPublicStoragePath = str_replace($storagePathPrefix, $publicStoragePathPrefix, $logoStoragePath);
        }
        $company = Company::create(['name' => $request->name, 'website' => $request->website, 'email' => $request->email, 'logo' => $logoPublicStoragePath]);
        Notification::send(Auth::user(), new CreateCompanyNotification($company));
        return Redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return View::make('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return View::make('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest $request
     * @param  \App\Models\Company                     $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $logoPublicStoragePath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $storagePathPrefix = "public/logos";
            $logoStoragePath = $logo->store($storagePathPrefix);
            $publicStoragePathPrefix = 'storage/logos';
            $logoPublicStoragePath = str_replace($storagePathPrefix, $publicStoragePathPrefix, $logoStoragePath);
        }
        $company->updateOrFail(
            [
                'name' => $request->name,
                'website' => $request->website,
                'email' => $request->email,
                'logo' => $logoPublicStoragePath
            ]
        );
        return Redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->deleteOrFail();
        return Redirect()->route('companies.index');
    }
}
