<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Validator;

class CharacterController extends Controller
{
    public function index(Request $request)
    {

        $character = Character::all();

        return response()->json(['Персонажи' => $character], 200);
    }

    // Метод для добавления нового персонажа
    public function store(Request $request)
    {
        // Проверка, авторизован ли пользователь
        if (!auth('api')->check()) {
            return response()->json(['error' => 'Пройдите авторизацию'], 401);
        }

        // Проверка, является ли пользователь администратором
        if (auth('api')->user()->role_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Валидация данных запроса
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        // Создание нового персонажа
        $character = Character::create($validated);

        // Возвращаем успешный ответ
        return response()->json($character, 201);
    }

    // Метод для редактирования персонажа
    public function update(Request $request, $id)
    {
        // Проверка, авторизован ли пользователь
        if (!auth('api')->check()) {
            return response()->json(['error' => 'Пройдите авторизацию'], 401);
        }

        // Проверка, является ли пользователь администратором
        if (auth('api')->user()->role_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Находим предмет по id
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['error' => 'Персонаж не найден'], 404);
        }

        // Валидация данных запроса
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        // Обновляем предмет
        $character->update($validated);

        // Возвращаем обновленный персонаж
        return response()->json($character, 200);
    }

    // Метод для удаления персонажа
    public function destroy($id)
    {
        // Проверка, авторизован ли пользователь
        if (!auth('api')->check()) {
            return response()->json(['error' => 'Пройдите авторизацию'], 401);
        }

        // Проверка, является ли пользователь администратором
        if (auth('api')->user()->role_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Находим предмет по id
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['error' => 'Персонаж не найден'], 404);
        }

        // Удаляем предмет
        $character->delete();

        // Возвращаем успешный ответ
        return response()->json(null, 204);
    }
}
