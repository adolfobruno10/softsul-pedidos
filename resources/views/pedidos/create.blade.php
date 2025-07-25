@extends('layouts.app')

@section('title', 'Novo Pedido')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-plus me-2"></i>Novo Pedido</h1>
    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nome_cliente" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control @error('nome_cliente') is-invalid @enderror" 
                               id="nome_cliente" name="nome_cliente" value="{{ old('nome_cliente') }}" required>
                        @error('nome_cliente')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Selecione o status</option>
                            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                            <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="data_pedido" class="form-label">Data do Pedido</label>
                        <input type="date" class="form-control @error('data_pedido') is-invalid @enderror" 
                               id="data_pedido" name="data_pedido" value="{{ old('data_pedido') }}" required>
                        @error('data_pedido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="data_entrega" class="form-label">Data de Entrega</label>
                        <input type="date" class="form-control @error('data_entrega') is-invalid @enderror" 
                               id="data_entrega" name="data_entrega" value="{{ old('data_entrega') }}" required>
                        @error('data_entrega')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('pedidos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Salvar Pedido
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Definir data mínima de entrega baseada na data do pedido
    document.getElementById('data_pedido').addEventListener('change', function() {
        const dataPedido = this.value;
        const dataEntrega = document.getElementById('data_entrega');
        dataEntrega.min = dataPedido;
        
        if (dataEntrega.value && dataEntrega.value < dataPedido) {
            dataEntrega.value = dataPedido;
        }
    });
</script>
@endsection

