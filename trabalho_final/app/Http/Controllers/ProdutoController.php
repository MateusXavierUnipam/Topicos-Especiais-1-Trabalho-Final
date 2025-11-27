<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    // Listar
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view('produtos.index', compact('produtos'));
    }

    // Salvar (Create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|mimes:jpeg,png|max:2048', // Req 4: Apenas PNG/JPG
        ]);

        if ($request->hasFile('imagem')) {
            // Salva na pasta 'public/produtos'
            $path = $request->file('imagem')->store('produtos', 'public');
            $validated['imagem'] = $path;
        }

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto criado!');
    }

    // Tela de Edição (Read p/ Update)
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    // Atualizar (Update)
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            // Apaga anterior se existir
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $path = $request->file('imagem')->store('produtos', 'public');
            $validated['imagem'] = $path;
        }

        $produto->update($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    // Excluir (Delete)
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}