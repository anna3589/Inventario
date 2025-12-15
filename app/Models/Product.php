<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Especificar el nombre de la tabla en la base de datos
    protected $table = 'products';
    
    // Campos que pueden ser llenados masivamente (mass assignment)
    protected $fillable = ['category_id', 'name', 'price', 'stock_quantity'];
    
    /**
     * Relación muchos a uno con el modelo Category
     * Un producto pertenece a una categoría
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'product_supplier', 'product_id', 'supplier_id')
                    ->withPivot('purchase_price')
                    ->withTimestamps();
    }
}