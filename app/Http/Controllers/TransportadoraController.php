<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransportadoraController extends Controller
{
    protected $baseUrl = 'http://127.0.0.1:3000/transportadoras';

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
            return response()->json(['error' => 'Transportadora não encontrada'], 404);
        }
    }

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string',
        'cnpj' => 'required|string',
        'endereco' => 'required|string',
    ]);

    $response = Http::post($this->baseUrl, [
        'nome' => $request->nome,
        'cnpj' => $request->cnpj,
        'endereco' => $request->endereco,
    ]);

    if ($response->successful()) {
        return response()->json($response->json(), 201);
    } else {
        return response()->json(['error' => 'Falha ao criar transportadora'], 500);
    }
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string',
        'cnpj' => 'required|string',
        'endereco' => '|string',
    ]);

    $response = Http::put("{$this->baseUrl}/{$id}", [
        'nome' => $request->nome,
        'cnpj' => $request->cnpj,
        'endereco' => $request->endereco,
    ]);

    if ($response->successful()) {
        return response()->json($response->json(), 200);
    } else {
        return response()->json(['error' => 'Falha ao atualizar transportadora'], 500);
    }
}

public function destroy($id)
{
    $response = Http::delete("{$this->baseUrl}/{$id}");

    if ($response->successful()) {
        return response()->json(['message' => 'Transportadora deletada com sucesso'], 200);
    } else {
        return response()->json(['error' => 'Falha ao deletar transportadora'], 500);
    }
}


}
