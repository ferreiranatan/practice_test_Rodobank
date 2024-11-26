<?php

namespace App\Database\Connections;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Http;

class JsonConnection extends Connection
{
    protected $host;

    public function __construct(array $config)
    {
        // Definindo o host do JSON Server
        $this->host = $config['host'] ?? 'http://127.0.0.1:3000'; // URL do JSON Server
        parent::__construct($config);
    }

    public function select($query, $bindings = [], $useReadPdo = true)
    {
        // Fazendo uma requisição GET no JSON Server
        $response = Http::get($this->host . $query);  // Exemplo de consulta com GET
        return $response->json();  // Retorna os dados JSON recebidos
    }

    // Override para evitar erros de 'database' e outros campos ausentes
    public function getDatabaseName()
    {
        // Retornando uma string vazia ou qualquer outro valor apropriado
        return '';
    }
}
