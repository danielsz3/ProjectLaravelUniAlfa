<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Studant;
use App\Rules\Cpf;
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
        $salas = Classroom::all();
        return view('studants.create', compact('salas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'nome' => 'required|string|max:100',
                'cpf' => ['required', 'string', 'size:14', 'unique:studants,cpf', new Cpf()],
                'ra' => 'required|integer',
                'nascimento' => 'required|date',
                'sala_id' => 'required|exists:classrooms,id',
            ],
            [
                'cpf.size' => 'Por favor, verifique o número do CPF digitado.',
                'cpf.required' => 'O campo CPF é obrigatório.',
            ]
        );

        Studant::create($validatedData);
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
        $salas = Classroom::all(); // Recupera todas as salas

        return view('studants.edit', [
            'studant' => $studant,
            'salas' => $salas, // Passa as salas para a view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Recupera o estudante pelo ID
        $studant = Studant::find($id);

        // Valida os dados do request
        $validatedData = $request->validate(
            [
                'nome' => 'required|string|max:100',
                'cpf' => [
                    'required',
                    'string',
                    'size:14',
                    'unique:studants,cpf,' . $studant->id, // Ignora o CPF atual na validação de unicidade
                    new Cpf(),
                ],
                'ra' => 'required|integer',
                'nascimento' => 'required|date',
                'sala_id' => 'required|exists:classrooms,id',
            ],
            [
                'cpf.size' => 'Por favor, verifique o número do CPF digitado.',
                'cpf.required' => 'O campo CPF é obrigatório.',
            ]
        );

        // Atualiza os dados do estudante
        $studant->update($validatedData);

        // Redireciona para a lista de estudantes
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
