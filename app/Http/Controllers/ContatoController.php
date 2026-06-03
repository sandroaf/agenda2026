<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\TipoContato;
use Illuminate\Support\Facades\Storage;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contato::query()->paginate(10);

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoContatos = TipoContato::all();
        return view('contatos.create', compact('tipoContatos'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $contatos = Contato::where('nome', 'LIKE', "%$q%")
            ->orWhere('email', 'LIKE', "%$q%")
            ->orWhere('telefone', 'LIKE', "%$q%")
            ->orWhere('cidade', 'LIKE', "%$q%")
            ->orWhere('estado', 'LIKE', "%$q%")
            ->paginate(10);
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20'
        ]);

        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        $contato->tipo_contato_id = $request->input('tipo_contato_id');
        if ($request->hasFile('foto')) {
            $contato->foto = $request->file('foto')->store('fotos', 'public');

        } else {
            $contato->foto = null;
        }

        if ($contato->save()) {
            return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso.');
        } else {
            return redirect()->route('contatos.create')->with('error', 'Erro ao criar contato. Tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::findOrFail($id);
        $tipoContato = TipoContato::find($contato->tipo_contato_id, ['nome']);

        return view('contatos.show', compact('contato', 'tipoContato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contato = Contato::findOrFail($id);
        $tipoContatos = TipoContato::all();

        return view('contatos.edit', compact('contato', 'tipoContatos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20'
        ]);

        $contato = Contato::findOrFail($id);
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        $contato->tipo_contato_id = $request->input('tipo_contato_id');
        if ($contato->foto && $request->hasFile('foto')) {
            Storage::disk('public')->delete($contato->foto);
        }
        if ($request->hasFile('foto')) {
            $contato->foto = $request->file('foto')->store('fotos', 'public');
        }
        if ($contato->save()) {
            return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso.');
        } else {
            return redirect()->route('contatos.edit', $contato->id)->with('error', 'Erro ao atualizar contato. Tente novamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::findOrFail($id);
        if ($contato->delete()) {
            if ($contato->foto) {
                Storage::disk('public')->delete($contato->foto);
            }
            return redirect()->route('contatos.index')->with('success', 'Contato excluído com sucesso.');
        } else {
            return redirect()->route('contatos.index')->with('error', 'Erro ao excluir contato. Tente novamente.');
        }
    }
}
