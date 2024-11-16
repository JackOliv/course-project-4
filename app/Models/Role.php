<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Таблица, связанная с моделью.
     */
    protected $table = 'roles';

    /**
     * Поля, которые можно заполнять массово.
     */
    protected $fillable = ['code', 'name'];

    /**
     * Определяем связь: одна роль может быть у нескольких пользователей.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
