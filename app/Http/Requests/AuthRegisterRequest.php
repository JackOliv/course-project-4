<?php

namespace App\Http\Requests;

use \App\Http\Requests\ApiRequest;

class AuthRegisterRequest extends ApiRequest
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
            'name' => 'required|string|max:100',
            'login' => 'required|string|unique:users|max:100',
            'password' => 'required|string|min:8|confirmed', // confirmed для подтверждения пароля
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
            'name.required' => 'Имя пользователя обязательно.',
            'login.required' => 'Логин обязателен.',
            'login.unique' => 'Этот логин уже занят.',
            'password.required' => 'Пароль обязателен.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ];
    }

    /**
     * Кастомная обработка ошибок валидации.
     *
     * @param \Illuminate\Validation\Validator $validator
     */

}
