<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        return Tarefa::all();
    }

    public function store(TarefaRequest $request)
    {
        Tarefa::create($request->all());
    }
  
    public function show(int $id)
    {
        return Tarefa::findOrFail($id);
    }

    public function update(TarefaRequest $request, int $id)
    {
        Tarefa::findOrFail($id)->update($request->toArray());
    }
    
    public function destroy(int $id)
    {
        Tarefa::findOrFail($id)->delete();
    }

    public function tarefaFeita(int $id)
    {
       $tarefa =  Tarefa::findOrFail($id);

       dd($tarefa);
    }
}
