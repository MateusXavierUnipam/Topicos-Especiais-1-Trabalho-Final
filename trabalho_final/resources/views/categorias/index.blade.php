@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Cadastrar Categoria</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input value="{{ old('nome') }}" type="text" name="nome" id="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao') }}</textarea>
      </div>

      <button class="btn btn-primary" type="submit">Salvar Categoria</button>
    </form>
  </div>

  <div class="col-md-6">
    <h3>Lista de Categorias</h3>
    @if($categorias->isEmpty())
      <p>Nenhuma categoria cadastrada.</p>
    @else
      <table class="table table-striped">
        <thead>
          <tr><th>Nome</th><th>Descrição</th><th>Criado em</th></tr>
        </thead>
        <tbody>
          @foreach($categorias as $c)
            <tr>
              <td>{{ $c->nome }}</td>
              <td>{{ \Illuminate\Support\Str::limit($c->descricao, 60) }}</td>
              <td>{{ $c->created_at->format('d/m/Y H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
