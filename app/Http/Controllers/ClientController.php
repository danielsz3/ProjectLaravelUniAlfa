<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Lista de algo
    public function index()
    {
        $client = Client::get();
        //dd($client[0]->nome);

        //Retornar os dados para uma view
        return view('clients.index', [
            'clients' => $client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //mostra o formulário, não envia pro banco
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //grava no banco de dados
    {
        $dados = $request->except('_token');
        Client::create($dados);
        return redirect('/clients');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //buscar o cliente no banco de dados
        $client = Client::find($id);

        return view('clients.show', [
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Busca cliente no bd
        $client = Client::find($id);

        // dd($client);

        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->update(
            [
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'observacao' => $request->observacao
            ]
        );

        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete(
            [
                //para inativar o método mudaria para update e setaria como inativo
            ]
        );
        return redirect('/clients');
    }
}
