<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CharacterController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'index']); // Просмотр списка пользователей
    Route::post('/users/{id}', [UserController::class, 'update']); // Редактирование пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Удаление пользователя
});
Route::get('/items', [ItemController::class, 'index']);// Получение списка всех предметов
Route::get('/items/create', [ItemController::class, 'store']);// Создание предметов
Route::post('/items/{id}', [ItemController::class, 'update']); // Редактирование предмета
Route::delete('/items/{id}', [ItemController::class, 'destroy']); // Удаление предмета

Route::get('/characters', [CharacterController::class, 'index']);// Получение списка всех персонажей
Route::get('/characters/create', [CharacterController::class, 'store']);// Получение списка всех персонажей
Route::post('/characters/{id}', [CharacterController::class, 'update']); // Редактирование персонажа
Route::delete('/characters/{id}', [CharacterController::class, 'destroy']); // Удаление персонажа
