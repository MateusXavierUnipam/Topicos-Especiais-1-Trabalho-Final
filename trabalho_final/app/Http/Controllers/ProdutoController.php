<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    // exibe formulário e lista de produtos
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->get();
        return view('produtos.index', compact('produtos'));
    }

    // recebe POST e salva
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0'
        ]);

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }
}
