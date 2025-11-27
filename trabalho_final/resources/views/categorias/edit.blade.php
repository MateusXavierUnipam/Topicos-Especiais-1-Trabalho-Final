@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
        <div class="card-header bg-warning">Editar Categoria</div>
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input value="{{ $categoria->nome }}" type="text" name="nome" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3">{{ $categoria->descricao }}</textarea>
              </div>
              <div class="d-flex justify-content-between">
                  <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                  <button class="btn btn-primary">Atualizar</button>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection