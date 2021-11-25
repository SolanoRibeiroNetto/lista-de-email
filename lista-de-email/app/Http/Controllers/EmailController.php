<?php

namespace App\Http\Controllers;

use App\Mail\clientesMail;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enviar(Request $request)
    {
        $request->validate([
            'mensagem' => 'required'
        ]);

        $clientes = Clientes::all();

        foreach($clientes as $cliente){
            if($cliente->email != null){
                Mail::send(new clientesMail($cliente, $request->mensagem));
            }
        }

        return redirect()->route('home');
        //
    }
}
