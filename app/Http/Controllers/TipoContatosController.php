<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoContato;

class TipoContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposContatos = TipoContato::all();

        return view('tipoContatos.index', compact('tiposContatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoContatos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255'
        ]);

        $tipoContato = new TipoContato();
        $tipoContato->nome = $request->input('nome');
        $tipoContato->descricao = $request->input('descricao');

        if ($tipoContato->save()) {
            return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato criado com sucesso.');
        } else {
            return redirect()->route('tipo-contatos.create')->with('error', 'Erro ao criar tipo de contato. Tente novamente.');
        }

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
        $tipoContato = TipoContato::findOrFail($id);
        return view('tipoContatos.edit', compact('tipoContato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255'
        ]);

        $tipoContato = TipoContato::findOrFail($id);
        $tipoContato->nome = $request->input('nome');
        $tipoContato->descricao = $request->input('descricao');

        if ($tipoContato->save()) {
            return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato atualizado com sucesso.');
        } else {
            return redirect()->route('tipo-contatos.edit', $tipoContato->id)->with('error', 'Erro ao atualizar tipo de contato. Tente novamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoContato = TipoContato::findOrFail($id);
        $tipoContato->delete();

        return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato excluído com sucesso.');
    }
}
