<?php

namespace App\Http\Controllers;

use App\Models\Studant;
use Illuminate\Http\Request;

class StudantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studant = Studant::get();
        //dd($client[0]->nome);

        return view('studants.index', [
            'studants' => $studant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('studants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->except('_token');
        Studant::create($dados);
        return redirect('/studants');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studant = Studant::find($id);

        return view('studants.show', [
            'studant' => $studant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $studant = Studant::find($id);

        return view('studants.edit', [
            'studant' => $studant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studant = Studant::find($id);
        $studant->update($request->all(
            [
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'ra' => $request->ra,
                'nascimento' => $request->nascimento,
                'sala_id' => $request->sala_id
            ]
        ));
        return redirect('/studants');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studant = Studant::find($id);
        $studant->delete(
            [
                //para inativar o método mudaria para update e setaria como inativo
            ]
        );
        return redirect('/studants');
    }
}
