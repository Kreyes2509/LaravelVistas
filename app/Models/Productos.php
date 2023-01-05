<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $fillable = [
        "id",
        "nombre",
        "descripcion",
        "precio",
        "stock",
        "imagen",
        'categoria_id'];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function productos()
    {
        return $this->belongsTo(Categoria::class);
    }

}
