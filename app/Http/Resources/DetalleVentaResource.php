<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleVentaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $detalle = $this->resource;

        return [
            'id' => $detalle->id,
            'producto_id' => $detalle->producto_id,
            'producto_nombre' => $detalle->producto->nombre ?? null,
            'cantidad' => $detalle->cantidad,
            'precio_unitario' => $detalle->precio_unitario,
            'porcentaje_descuento' => $detalle->porcentaje_descuento,
            'descuento' => $detalle->descuento,
            'subtotal' => $detalle->subtotal,
            'total' => $detalle->total,
        ];
    }
}
