<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Producto
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $descripcion
 * @property int|null $categoria_id
 * @property float $precio_compra
 * @property float $precio_venta
 * @property int $stock
 * @property int $stock_minimo
 * @property string|null $unidad_medida
 * @property string|null $imagen
 * @property bool $estado
 * @property-read float $margen_utilidad
 * @property-read bool $tiene_stock_bajo
 * @property-read Categoria|null $categoria
 */
class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'categoria_id',
        'precio_compra',
        'precio_venta',
        'stock',
        'stock_minimo',
        'unidad_medida',
        'imagen',
        'estado',
    ];

    protected $casts = [
        'precio_compra' => 'decimal:2',
        'precio_venta' => 'decimal:2',
        'stock' => 'integer',
        'stock_minimo' => 'integer',
        'estado' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = ['margen_utilidad', 'tiene_stock_bajo'];

    /**
     * Relación con categoría
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Scope para productos activos
     */
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    /**
     * Scope para productos inactivos
     */
    public function scopeInactivos($query)
    {
        return $query->where('estado', false);
    }

    /**
     * Scope para productos con stock bajo
     */
    public function scopeStockBajo($query)
    {
        return $query->whereColumn('stock', '<=', 'stock_minimo');
    }

    /**
     * Accessor para margen de utilidad
     */
    public function getMargenUtilidadAttribute(): float
    {
        if ($this->precio_compra > 0) {
            return round((($this->precio_venta - $this->precio_compra) / $this->precio_compra) * 100, 2);
        }

        return 0;
    }

    /**
     * Accessor para verificar stock bajo
     */
    public function getTieneStockBajoAttribute(): bool
    {
        return $this->stock <= $this->stock_minimo;
    }

    /**
     * Generar código automático
     */
    public static function generarCodigo(): string
    {
        $ultimo = self::orderBy('id', 'desc')->first();
        $numero = $ultimo ? (int) substr($ultimo->codigo, 4) + 1 : 1;

        return 'PROD'.str_pad((string) $numero, 6, '0', STR_PAD_LEFT);
    }
}
