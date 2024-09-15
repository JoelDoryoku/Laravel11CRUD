<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use App\Models\ProcedureType;
use App\Models\Client;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procedures = Procedure::all();
        $procedureTypes = ProcedureType::all();
        $clients = Client::all();
        return view('procedures.index', compact('procedures', 'procedureTypes', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $procedureTypes = ProcedureType::all();
        $clients = Client::all();
        return view('procedures.create', compact('procedureTypes', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'procedure_type_id' => 'required',
            'client_id' => 'required',
        ]);

        Procedure::create($request->all());

        return redirect()->route('procedures.index')
            ->with('success', 'Procedure created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $procedure = Procedure::findOrFail($id);
        $procedureTypes = ProcedureType::all();
        $clients = Client::all();
        return view('procedures.edit', compact('procedure', 'procedureTypes', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'procedure_type_id' => 'required',
            'client_id' => 'required',
        ]);

        $procedure = Procedure::findOrFail($id);
        $procedure->update($request->all());

        return redirect()->route('procedures.index')
            ->with('success', 'Procedure updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $procedure = Procedure::findOrFail($id);
        $procedure->delete();

        return redirect()->route('procedures.index')
            ->with('success', 'Procedure deleted successfully');
    }

    /**
     * Return the procedures as JSON.
     */
    public function getProcedures() {
        $procedures = Procedure::all();
        return response()->json($procedures);
    }

    /**
     * Return the procedures by status as JSON.
     */
    public function getProcedureByStatus(string $status) {
        $procedures = Procedure::where('status', $status)->get();
        return response()->json($procedures);
    }

    /**
     * Return the procedures by type as JSON.
     */
    public function getProcedureByType(string $type) {
        $procedures = Procedure::where('procedure_type_id', $type)->get();
        return response()->json($procedures);
    }

    /**
     * Return the procedures by client as JSON.
     */
    public function getProcedureByClient(string $client) {
        $procedures = Procedure::where('client_id', $client)->get();
        return response()->json($procedures);
    }
}
