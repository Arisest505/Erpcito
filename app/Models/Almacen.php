<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    // Define la tabla asociada al modelo (opcional si el nombre de la tabla es el plural del modelo)
    protected $table = 'almacens';

    // Define los campos que se pueden asignar masivamente
    protected $fillable = ['nombre'];

    // Relación con productos
    public function products()
    {
        return $this->hasMany(Product::class, 'almacen_id');
    }
}
