@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">Listagem dos produtos</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<a href="{{route('produtos.create')}}" title="Cadastrar" class="btn btn-primary bn-add">
			<span class="glyphicon glyphicon-plus"></span> Cadastrar
		</a>
		@foreach($products as $product)
	        <tr>
				<td>{{$product->name}}</td>
				<td>{{$product->description}}</td>
				<td width="100px">
					<a href="{{route('produtos.edit', $product->id)}}" title="Editar" class="actions edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="" title="Deletar" class="actions delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection