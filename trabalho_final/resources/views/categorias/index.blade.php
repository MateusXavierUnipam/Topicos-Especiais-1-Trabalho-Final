@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Nova Categoria</div>
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
              </div>
              <button class="btn btn-primary w-100">Salvar</button>
            </form>
        </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
        <div class="card-header">Lista de Categorias</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                  <tr>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th class="text-end">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($categorias as $c)
                    <tr>
                      <td>{{ $c->nome }}</td>
                      <td>{{ Str::limit($c->descricao, 40) }}</td>
                      <td class="text-end">
                          <a href="{{ route('categorias.edit', $c->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <form action="{{ route('categorias.destroy', $c->id) }}" method="POST" class="d-inline">
                              @csrf @method('DELETE')
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')"><i class="fas fa-trash"></i></button>
                          </form>
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="3" class="text-center text-muted">Vazia.</td></tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
@endsection