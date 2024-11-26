<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CaminhaoController extends Controller
{
    protected $baseUrl = 'http://127.0.0.1:3000/caminhoes';


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
            return response()->json(['error' => 'Caminhão não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'ano' => 'required|integer',
            'id_transportadora' => 'required|integer',
        ]);

        $response = Http::post($this->baseUrl, [
            'placa' => $request->placa,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'id_transportadora' => $request->id_transportadora,
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 201);
        } else {
            return response()->json(['error' => 'Falha ao criar caminhão'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required|string',
            'modelo' => 'required|string',
            'ano' => 'required|integer',
            'id_transportadora' => 'required|integer',
        ]);

        $response = Http::put("{$this->baseUrl}/{$id}", [
            'placa' => $request->placa,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'id_transportadora' => $request->id_transportadora,
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json(['error' => 'Falha ao atualizar caminhão'], 500);
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return response()->json(['message' => 'Caminhão deletado com sucesso'], 200);
        } else {
            return response()->json(['error' => 'Falha ao deletar caminhão'], 500);
        }
    }
}
