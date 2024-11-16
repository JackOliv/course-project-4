<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildItem extends Model
{
    use HasFactory;

    // Имя таблицы
    protected $table = 'builditems';

    // Заполняемые поля для массового присвоения
    protected $fillable = [
        'build_id', // Сборка, к которой относится предмет
        'item_id',  // ID предмета
        'part_id',  // ID части сборки
    ];

    // Связь с Build ("многие к одному")
    public function build()
    {
        return $this->belongsTo(Build::class);
    }

    // Связь с Item ("многие к одному")
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    // Связь с Part ("многие к одному")
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
