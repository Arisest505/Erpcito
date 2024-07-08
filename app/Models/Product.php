<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'unit_price', 'unit_of_measure', 'stock', 'category_id', 'almacen_id'
    ];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relación con el almacén
    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    // Relación con las reglas de abastecimiento
    public function supplyRules()
    {
        return $this->hasMany(SupplyRule::class);
    }
}
