<?php

namespace App\Http\Resources;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource; // ✅ Importar el modelo

class DetalleCompraResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var DetalleCompra $detalle */
        $detalle = $this->resource;

        return [
            'id' => $detalle->id,
            'producto_id' => $detalle->producto_id,
            'producto_nombre' => $detalle->producto->nombre ?? null,
            'cantidad' => $detalle->cantidad,
            'precio_unitario' => $detalle->precio_unitario,
            'porcentaje_descuento' => $detalle->porcentaje_descuento,
            'subtotal' => $detalle->subtotal,
            'total' => $detalle->total,
        ];
    }
}
