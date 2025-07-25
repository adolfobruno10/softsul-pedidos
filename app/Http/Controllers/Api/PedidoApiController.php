<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PedidoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $pedidos = Pedido::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'data' => $pedidos,
                'message' => 'Pedidos recuperados com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao recuperar pedidos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'nome_cliente' => 'required|string|max:255',
                'data_pedido' => 'required|date',
                'data_entrega' => 'required|date|after_or_equal:data_pedido',
                'status' => 'required|in:pendente,entregue,cancelado'
            ]);

            $pedido = Pedido::create($request->all());

            return response()->json([
                'success' => true,
                'data' => $pedido,
                'message' => 'Pedido criado com sucesso'
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $pedido = Pedido::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $pedido,
                'message' => 'Pedido encontrado'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pedido não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao buscar pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $pedido = Pedido::findOrFail($id);
            
            $request->validate([
                'nome_cliente' => 'required|string|max:255',
                'data_pedido' => 'required|date',
                'data_entrega' => 'required|date|after_or_equal:data_pedido',
                'status' => 'required|in:pendente,entregue,cancelado'
            ]);

            $pedido->update($request->all());

            return response()->json([
                'success' => true,
                'data' => $pedido,
                'message' => 'Pedido atualizado com sucesso'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pedido não encontrado'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $pedido = Pedido::findOrFail($id);
            $pedido->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pedido excluído com sucesso'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pedido não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao excluir pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

