<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Указываем таблицу, если имя таблицы не соответствует стандарту
    protected $table = 'items';

    // Заполняемые поля для массового присвоения
    protected $fillable = [
        'name',
        'description',
        'cost',
        'tier',
        'type',
    ];

    // Определение связи с моделью Build (если необходимо)
    public function buildsitem()
    {
        return $this->belongsTo(BuildItem::class);
    }
}
