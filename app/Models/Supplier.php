<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    
    protected $fillable = [
        'name',
        'contact_person', 
        'phone', 
        'email', 
        'address'
    ];
    
    /**
     * Get the products supplied by this supplier.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_supplier')
                    ->withPivot('purchase_price')
                    ->withTimestamps();
    }
}