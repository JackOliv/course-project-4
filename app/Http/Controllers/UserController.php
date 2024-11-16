<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Проверка, авторизован ли пользователь
        if (!auth('api')->check()) {
            return response()->json(['error' => 'Пройдите авторизацию'], 401);
        }

        // Проверка, является ли пользователь администратором
        if (auth('api')->user()->role_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Если пользователь авторизован и является администратором, возвращаем список пользователей
        $users = User::select('id', 'name')->get();

        // Убедимся, что данные отправляются с корректной кодировкой
        return response()->json(['Пользователи' => $users], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
    {
        // Получаем пользователя
        $user = User::find($id);

        // Проверяем, существует ли пользователь
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Проверяем, что пользователь может редактировать себя или быть администратором
        if (auth()->user()->id !== $user->id && auth()->user()->role_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Создаем массив правил валидации
        $rules = [];

        // Если имя передано в запросе, добавляем его валидацию
        if ($request->has('name')) {
            $rules['name'] = 'required|string|max:100';
        }

        // Если пароль передан, добавляем его валидацию
        if ($request->has('password')) {
            $rules['password'] = 'required|string|min:6|confirmed'; // password_confirmation обязательно
        }

        // Выполняем валидацию
        $validated = $request->validate($rules);

        // Обновляем данные пользователя
        if (isset($validated['name'])) {
            $user->name = $validated['name'];
        }

        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Сохраняем изменения
        $user->save();

        // Возвращаем успешный ответ
        return response()->json([
            'id' => $user->id,
            'name' => $user->name
        ], 200);
    }

    public function destroy($id)
{
    // Проверяем, является ли пользователь администратором
    if (auth()->user()->role_id !== 1) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Ищем пользователя
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Удаляем пользователя
    $user->delete();

    return response()->json('Пользователь удалён');
}

}
