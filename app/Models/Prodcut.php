<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodcut extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['jenis'];
    protected $appends = ['total_barang'];
    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
    public function getTotalBarang() {
        return $this->barangs->count();
    }
}
