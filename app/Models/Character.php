<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    // Имя таблицы
    protected $table = 'characters';

    // Заполняемые поля для массового присвоения
    protected $fillable = [
        'name',  // Имя персонажа
        'image', // URL изображения персонажа
    ];

    // Связь с таблицей builds ("один ко многим")
    public function builds()
    {
        return $this->hasMany(Build::class, 'character_id');
    }
}
