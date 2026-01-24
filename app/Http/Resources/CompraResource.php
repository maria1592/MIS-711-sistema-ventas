<?php

namespace App\Http\Resources;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource; // ✅ Importar el modelo

class CompraResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Compra $compra */
        $compra = $this->resource;

        return [
            'id' => $compra->id,
            'codigo' => $compra->codigo,
            'proveedor' => new ProveedorResource($this->whenLoaded('proveedor')),
            'tipo_compra' => $compra->tipo_compra,
            'tipo_comprobante' => $compra->tipo_comprobante,
            'numero_comprobante' => $compra->numero_comprobante,
            'fecha_compra' => $compra->fecha_compra->format('Y-m-d'),
            'fecha_vencimiento' => $compra->fecha_vencimiento?->format('Y-m-d'),
            'porcentaje_impuesto' => $compra->porcentaje_impuesto,
            'porcentaje_descuento' => $compra->porcentaje_descuento,
            'total' => $compra->total,
            'estado' => $compra->estado,
            'observaciones' => $compra->observaciones,
            'detalles' => DetalleCompraResource::collection($this->whenLoaded('detalles')),
            'can_edit' => $compra->puede_editarse,
            'created_at' => $compra->created_at->toIso8601String(),
        ];
    }
}
