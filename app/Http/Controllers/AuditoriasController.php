<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditorias;

class AuditoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $auditoria = Auditorias::All();
        return \response($auditoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Titulo' => 'required',
            'Descripcion' => 'required|max:255',
            'Status' => 'required',
            'Valoracion' => 'required'
        ]);

        $auditoria = Auditorias::create($request->all());
        return \response($auditoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $auditoria = Auditorias::findOrFail($id);
        return \response($auditoria);
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
        //

         Auditorias::findOrFail($id)
        ->update($request->all());
        return \response(content:"Auditoria ha sido actualizada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Auditorias::destroy($id);

        return \response(content:"La auditoria ha sido terminada con el id: ${id}");
    }
}
