@extends('layouts.app')

@section('title', 'Lista de Pedidos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-list me-2"></i>Lista de Pedidos</h1>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Novo Pedido
    </a>
</div>

@if($pedidos->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Data do Pedido</th>
                            <th>Data de Entrega</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->nome_cliente }}</td>
                            <td>{{ $pedido->data_pedido->format('d/m/Y') }}</td>
                            <td>{{ $pedido->data_entrega->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge status-badge status-{{ $pedido->status }}">
                                    {{ ucfirst($pedido->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('pedidos.show', $pedido) }}" class="btn btn-info btn-sm btn-action">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-warning btn-sm btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este pedido?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-body text-center">
            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Nenhum pedido encontrado</h4>
            <p class="text-muted">Clique no botão "Novo Pedido" para adicionar o primeiro pedido.</p>
            <a href="{{ route('pedidos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Novo Pedido
            </a>
        </div>
    </div>
@endif
@endsection

