<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
{
    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
