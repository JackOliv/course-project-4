<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Build extends Model
{
    use HasFactory;

    // Имя таблицы
    protected $table = 'builds';

    // Заполняемые поля для массового присвоения
    protected $fillable = [
        'name',         // Название сборки
        'character_id', // ID персонажа
        'user_id',      // ID пользователя
    ];

    // Связь с таблицей characters ("многие к одному")
    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    // Связь с таблицей users ("многие к одному")
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Связь "многие ко многим" через таблицу builditems


    // Связь "многие к одному" для частей сборки через builditems
    public function parts()
    {
        return $this->hasManyThrough(
            Part::class, // Модель конечной таблицы
            BuildItem::class, // Модель промежуточной таблицы
            'build_id', // Внешний ключ в промежуточной таблице, указывающий на текущую модель
            'id', // Локальный ключ в конечной таблице
            'id', // Локальный ключ в текущей таблице
            'part_id' // Внешний ключ в промежуточной таблице, указывающий на конечную таблицу
        );
    }
}
