<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }
}
