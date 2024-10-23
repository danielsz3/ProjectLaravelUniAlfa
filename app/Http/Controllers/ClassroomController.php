<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca todas as salas
        $classrooms = Classroom::get();

        return view('classrooms.index', [
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view de criação de sala
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Coleta os dados do request, exceto o _token
        $dados = $request->except('_token');

        // Cria uma nova sala
        Classroom::create($dados);

        // Redireciona para a lista de salas
        return redirect('/classrooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca a sala pelo ID
        $classroom = Classroom::find($id);

        return view('classrooms.show', [
            'classroom' => $classroom
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca a sala pelo ID
        $classroom = Classroom::find($id);

        return view('classrooms.edit', [
            'classroom' => $classroom
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Busca a sala pelo ID
        $classroom = Classroom::find($id);

        // Atualiza a sala com os dados do request
        $classroom->update($request->all());

        // Redireciona para a lista de salas
        return redirect('/classrooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca a sala pelo ID
        $classroom = Classroom::find($id);

        // Remove a sala do banco de dados
        $classroom->delete();

        // Redireciona para a lista de salas
        return redirect('/classrooms');
    }
}
