<?php

namespace Modules\Kanban\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Common\Http\Controllers\BaseController;

class KanbanBaseController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kanban::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kanban::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('kanban::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('kanban::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
