<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuildItem;

class Part extends Model
{
    use HasFactory;

    // Имя таблицы
    protected $table = 'part';

    // Заполняемые поля для массового присвоения
    protected $fillable = [
        'name', // Название части сборки
    ];

    // Связь с BuildItem ("один ко многим")
    public function buildItems()
    {
        return $this->hasMany(BuildItem::class, 'part_id');
    }
}
