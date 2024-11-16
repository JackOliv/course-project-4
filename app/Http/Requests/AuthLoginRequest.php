<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AuthLoginRequest extends ApiRequest
{
    /**
     * Определите, авторизован ли пользователь для выполнения этого запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Получите правила валидации для запроса.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|string|exists:users,login', // Логин должен быть строкой и существовать в базе данных
            'password' => 'required|string|min:8', // Пароль должен быть строкой и содержать минимум 8 символов
        ];
    }

    /**
     * Сообщения ошибок для валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'login.required' => 'Логин обязателен.',
            'login.exists' => 'Логин не существует.',
            'password.required' => 'Пароль обязателен.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ];
    }
}
