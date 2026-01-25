<?php

namespace App\Http\Resources;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /** @var Producto */
    public $resource;

    public function toArray(Request $request): array
    {
        $producto = $this->resource;

        return [
            'id' => $producto->id,
            'codigo' => $producto->codigo,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'categoria_id' => $producto->categoria_id,
            'categoria' => new CategoriaResource($this->whenLoaded('categoria')),
            'precio_compra' => $producto->precio_compra,
            'precio_venta' => $producto->precio_venta,
            'stock' => $producto->stock,
            'stock_minimo' => $producto->stock_minimo,
            'unidad_medida' => $producto->unidad_medida,
            'imagen' => $producto->imagen,
            'imagen_url' => $producto->imagen ? url('storage/'.$producto->imagen) : null,
            'estado' => $producto->estado,
            'created_at' => $producto->created_at,
        ];
    }
}
