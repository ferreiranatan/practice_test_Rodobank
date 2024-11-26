<?php

use App\Http\Controllers\TransportadoraController;

Route::get('/transportadoras', [TransportadoraController::class, 'index']);

