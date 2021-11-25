<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required'
        ]);

        $cliente = new Clientes();
        $cliente->nome = $request->nome;

        if(!empty($request->email)){
            $cliente->email = $request->email;
        }
        
        if(!empty($request->telefone)){
            $cliente->telefone = $request->telefone;
        }

        $cliente->save();

        return redirect()->route('clientes');

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::where('id', $id)->first();
        return view('clientes.edit',['cliente' => $cliente]);
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
        $request->validate([
            'nome' => 'required'
        ]);

        $cliente = Clientes::where('id', $id)->first();

        $cliente->nome = $request->nome;

        if(!empty($request->email)){
            $cliente->email = $request->email;
        }
        
        if(!empty($request->telefone)){
            $cliente->telefone = $request->telefone;
        }

        $cliente->save();

        return redirect()->route('clientes');


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
    }
}
