@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
        <div class="card-header bg-warning">Editar: {{ $produto->nome }}</div>
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
              @csrf @method('PUT')

              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input value="{{ $produto->nome }}" type="text" name="nome" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Preço</label>
                <input value="{{ $produto->preco }}" type="number" step="0.01" name="preco" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Imagem</label>
                @if($produto->imagem)
                    <div class="mb-2"><img src="{{ asset('storage/' . $produto->imagem) }}" width="80" class="img-thumbnail"></div>
                @endif
                <input type="file" name="imagem" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3">{{ $produto->descricao }}</textarea>
              </div>

              <div class="d-flex justify-content-between">
                  <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                  <button class="btn btn-primary">Atualizar</button>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection