<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/list_all_users', [ChatController::class, 'listAllUsers']);
Route::get('/view_messages', [ChatController::class, 'viewMessages']);
Route::post('/send_message', [ChatController::class, 'sendMessage']);

