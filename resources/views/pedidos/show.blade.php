@extends('layouts.app')

@section('title', 'Detalhes do Pedido')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-eye me-2"></i>Detalhes do Pedido #{{ $pedido->id }}</h1>
    <div>
        <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-2"></i>Editar
        </a>
        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Pedido</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">ID do Pedido:</label>
                    <p class="form-control-plaintext">{{ $pedido->id }}</p>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nome do Cliente:</label>
                    <p class="form-control-plaintext">{{ $pedido->nome_cliente }}</p>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p class="form-control-plaintext">
                        <span class="badge status-badge status-{{ $pedido->status }}">
                            {{ ucfirst($pedido->status) }}
                        </span>
                    </p>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Data do Pedido:</label>
                    <p class="form-control-plaintext">{{ $pedido->data_pedido->format('d/m/Y') }}</p>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Data de Entrega:</label>
                    <p class="form-control-plaintext">{{ $pedido->data_entrega->format('d/m/Y') }}</p>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Criado em:</label>
                    <p class="form-control-plaintext">{{ $pedido->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
                
                @if($pedido->updated_at != $pedido->created_at)
                <div class="mb-3">
                    <label class="form-label fw-bold">Última atualização:</label>
                    <p class="form-control-plaintext">{{ $pedido->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Ações</h5>
    </div>
    <div class="card-body">
        <div class="d-flex gap-2">
            <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Editar Pedido
            </a>
            
            <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="d-inline" 
                  onsubmit="return confirm('Tem certeza que deseja excluir este pedido? Esta ação não pode ser desfeita.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash me-2"></i>Excluir Pedido
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

