<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Venta;

class VentaResource extends JsonResource
{
    /** @var Venta */
    public $resource;

    public function toArray(Request $request): array
    {
        $venta = $this->resource;

        return [
            'id' => $venta->id,
            'codigo' => $venta->codigo,
            'cliente' => new ClienteResource($venta->whenLoaded('cliente')),
            'tipo_venta' => $venta->tipo_venta,
            'tipo_comprobante' => $venta->tipo_comprobante,
            'numero_comprobante' => $venta->numero_comprobante,
            'fecha_venta' => $venta->fecha_venta->format('Y-m-d'),
            'fecha_vencimiento' => $venta->fecha_vencimiento?->format('Y-m-d'),
            'subtotal' => $venta->subtotal,
            'porcentaje_impuesto' => $venta->porcentaje_impuesto,
            'impuesto' => $venta->impuesto,
            'porcentaje_descuento' => $venta->porcentaje_descuento,
            'descuento' => $venta->descuento,
            'total' => $venta->total,
            'estado' => $venta->estado,
            'observaciones' => $venta->observaciones,
            'detalles' => DetalleVentaResource::collection($venta->whenLoaded('detalles')),
            'can_edit' => $venta->puede_editarse, // Accessor del modelo
            'created_at' => $venta->created_at->toIso8601String(),
        ];
    }
}
