@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-header bg-success text-white">Novo Produto</div>
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-2">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Imagem (PNG/JPG)</label>
                <input type="file" name="imagem" class="form-control" accept="image/png, image/jpeg">
              </div>
              <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="2"></textarea>
              </div>
              <button class="btn btn-success w-100">Salvar</button>
            </form>
        </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
        <div class="card-header">Lista de Produtos</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                  <tr>
                      <th width="80">Img</th>
                      <th>Nome</th>
                      <th>Preço</th>
                      <th class="text-end">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($produtos as $p)
                    <tr>
                      <td>
                          @if($p->imagem)
                            <img src="{{ asset('storage/' . $p->imagem) }}" class="img-thumbnail" style="height: 80px, width: 80px;">
                          @else
                            <small class="text-muted">-</small>
                          @endif
                      </td>
                      <td>{{ $p->nome }}</td>
                      <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                      <td class="text-end">
                          <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" class="d-inline">
                              @csrf @method('DELETE')
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')"><i class="fas fa-trash"></i></button>
                          </form>
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="4" class="text-center text-muted">Vazio.</td></tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
@endsection