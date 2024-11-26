<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MotoristaController extends Controller
{
    protected $baseUrl = 'http://127.0.0.1:3000/motoristas';


    public function getAll()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Falha ao conectar com o servidor JSON'], 500);
        }
    }


    public function show($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Motorista não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'id_transportadora' => 'required|integer',
        ]);

        $response = Http::post($this->baseUrl, [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'id_transportadora' => $request->id_transportadora,
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 201);
        } else {
            return response()->json(['error' => 'Falha ao criar motorista'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'id_transportadora' => 'required|integer',
        ]);

        $response = Http::put("{$this->baseUrl}/{$id}", [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'id_transportadora' => $request->id_transportadora,
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json(['error' => 'Falha ao atualizar motorista'], 500);
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return response()->json(['message' => 'Motorista deletado com sucesso'], 200);
        } else {
            return response()->json(['error' => 'Falha ao deletar motorista'], 500);
        }
    }
}
