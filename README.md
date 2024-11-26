# Documentação da API de Transportadoras, Motoristas e Caminhões

## 1. Introdução

Esta documentação descreve como configurar e usar a API para gerenciar transportadoras, motoristas e caminhões. A aplicação é dividida em duas partes principais:

1. **Backend (Laravel API)**: Responsável pela lógica de negócios e comunicação com o JSON Server.
2. **JSON Server**: Utilizado para simular um banco de dados simples (em formato JSON).

## 2. Requisitos

Para rodar a API, você precisará de:

- **PHP 8.x ou superior**
- **Composer**
- **Laravel 8.x ou superior**
- **JSON Server** (para simular o banco de dados)
- **Insomnia/Postman** (para realizar requisições)

## 3. Configuração do Ambiente

### 3.1. Instalação do JSON Server

O JSON Server é uma ferramenta simples que permite criar um banco de dados em formato JSON e usá-lo como um backend RESTful.

#### Passos:
1. Instale o JSON Server globalmente:
   ```bash
   npm install -g json-server
   ```
2. Crie um arquivo db.json que simula as tabelas transportadoras, motoristas e caminhoes. Exemplo de db.json:
   ```bash
   "transportadoras": [
    {
      "id": 1,
      "nome": "Transportadora ABC",
      "cnpj": "12345678000199",
      "endereco":"rua da barca velha"
    }
   ],
  "motoristas": [
    {
      "id": 1,
      "nome": "João Silva",
      "cpf": "123456789012345",
      "id_transportadora":
    }
   ],
  "caminhoes": [
    {
      "id": 1,
      "placa": "ABC-1234",
      "modelo": "Scania R 450"
      "ano": 2009,
      "id_transportadora": 1
    }
   ]

   ```
3.Execute o JSON Server:

  ```bash
 json-server --watch db.json --port 3000
  ```
O JSON Server agora estará rodando em http://127.0.0.1:3000, simulando um banco de dados com as tabelas transportadoras, motoristas e caminhoes.

### 3.2. Instalação da Aplicação Laravel

###
 1.Instale o Laravel:
 ```bash
 composer create-project --prefer-dist laravel/laravel transportadoras-api
 ```

###
 2.Instale dependências adicionais (HTTP Client): Laravel já vem com o Http Client, mas se precisar de algum pacote extra, instale com o Composer:
 ```bash
 composer require guzzlehttp/guzzle
 ```
 
###
 3.Crie o controlador para cada entidade (Transportadora, Motorista, Caminhão):
 ```bash
 php artisan make:controller TransportadoraController
php artisan make:controller MotoristaController
php artisan make:controller CaminhaoController
 ```
###
3.3. Configuração do .env No arquivo .env da aplicação Laravel, configure as variáveis para apontar para o servidor JSON.
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:8fP0MZTzES7GZP9UVJ6T9U0Dgmlw6P0BZnRzAv59Bw8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=json # Indica que estamos usando o JSON Server
DB_HOST=http://127.0.0.1:3000 # URL do JSON Server
 ```
 
###
4. Endpoints e Métodos:
A seguir estão os endpoints e exemplos de uso para as transportadoras, motoristas e caminhões.

## Transportadoras

** GET /api/transportadoras: Lista todas as transportadoras.
**Exemplo de requisição:

```bash
GET http://127.0.0.1:8000/api/transportadoras
```

Resposta (sucesso)
```bash

   "transportadoras": [
    {
      "id": 1,
      "nome": "Transportadora ABC",
      "cnpj": "12345678000199",
      "endereco":"rua da barca velha"
    }
   
]
```

GET /api/transportadoras/{id}: Exibe os detalhes de uma transportadora específica.

Exemplo de requisição:
```bash
GET http://127.0.0.1:8000/api/transportadoras/1
```

Resposta (sucesso):
```bash
{
  "id": 1,
  "nome": "Transportadora ABC",
  "cnpj": "12345678000199",
  "endereco":"rua da barca velha"
}
```

POST /api/transportadoras: Cria uma nova transportadora.
 Exemplo de requisição:
 ```bash
 POST http://127.0.0.1:8000/api/transportadoras
Content-Type: application/json

{
  "nome": "Transportadora XYZ",
  "cnpj": "98765432000100",
  "endereco":"rua da barca velha"
}
```

 Resposta (sucesso):
```bash
{
  "id": 2,
  "nome": "Transportadora XYZ",
  "cnpj": "98765432000100",
 "endereco":"rua da barca velha"
}

```

 Exemplo de requisição:
```bash
PUT http://127.0.0.1:8000/api/transportadoras/1
Content-Type: application/json

{
  "nome": "Transportadora ABC Atualizada",
  "cnpj": "12345678000199",
  "endereco": "rua dois"
}
```
Resposta (sucesso):

```bash
{
  "id": 1,
  "nome": "Transportadora ABC Atualizada",
  "cnpj": "12345678000199",
  "endereco": "rua dois"

}
```

DELETE /api/transportadoras/{id}: Deleta uma transportadora.

Exemplo de requisição:
```bash
DELETE http://127.0.0.1:8000/api/transportadoras/1
```

Resposta (sucesso):
```bash
{
  "message": "Transportadora deletada com sucesso"
}
```
Motoristas
GET /api/motoristas: Lista todos os motoristas.
GET /api/motoristas/{id}: Exibe os detalhes de um motorista.
POST /api/motoristas: Cria um novo motorista.
PUT /api/motoristas/{id}: Atualiza os dados de um motorista.
DELETE /api/motoristas/{id}: Deleta um motorista.
Caminhões
GET /api/caminhoes: Lista todos os caminhões.
GET /api/caminhoes/{id}: Exibe os detalhes de um caminhão.
POST /api/caminhoes: Cria um novo caminhão.
PUT /api/caminhoes/{id}: Atualiza os dados de um caminhão.
DELETE /api/caminhoes/{id}: Deleta um caminhão.
5. Testando a API
Você pode usar ferramentas como Insomnia ou Postman para testar os endpoints. Aqui estão exemplos de como configurar cada requisição:

Exemplo de Requisição POST (Transportadora).
###
1.Abra o Insomnia ou Postman
###
2.Selecione o método POST.
###
3.Insira a URL: 
###
4.http://127.0.0.1:8000/api/transportadoras.
###
5.No corpo da requisição, insira os dados no formato JSON:
```bash
{
  "nome": "Transportadora Nova",
  "cnpj": "12345678000199",
  "endereco": "rua tres"

}
```
###
5.Clique em Send para enviar a requisição.

Exemplo de Requisição GET (Motorista)
Abra o Insomnia ou Postman.
Selecione o método GET.
Insira a URL: http://127.0.0.1:8000/api/motoristas.
Clique em Send para obter todos os motoristas.
## 6. Conclusão
 Essa API permite gerenciar transportadoras, motoristas e caminhões usando o Laravel para a lógica de negócios e o JSON Server para simular um banco de dados. Ao seguir os passos de configuração e utilizar os exemplos de requisição fornecidos, você poderá testar a API localmente.


