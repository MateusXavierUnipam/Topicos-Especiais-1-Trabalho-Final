@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Cadastrar Produto</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input value="{{ old('nome') }}" type="text" name="nome" id="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao') }}</textarea>
      </div>

      <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input value="{{ old('preco') }}" type="number" step="0.01" name="preco" id="preco" class="form-control" required>
      </div>

      <button class="btn btn-primary" type="submit">Salvar Produto</button>
    </form>
  </div>

  <div class="col-md-6">
    <h3>Lista de Produtos</h3>
    @if($produtos->isEmpty())
      <p>Nenhum produto cadastrado.</p>
    @else
      <table class="table table-striped">
        <thead>
          <tr><th>Nome</th><th>Preço</th><th>Criado em</th></tr>
        </thead>
        <tbody>
          @foreach($produtos as $p)
            <tr>
              <td>{{ $p->nome }}</td>
              <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
              <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
