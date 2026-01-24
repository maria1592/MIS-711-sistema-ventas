<?php

namespace App\Http\Resources;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
{
    /** @var Proveedor */
    public $resource;

    public function toArray(Request $request): array
    {
        $proveedor = $this->resource;

        return [
            'id' => $proveedor->id,
            'codigo' => $proveedor->codigo,
            'nombre' => $proveedor->persona->nombre_completo ?? $proveedor->persona->razon_social ?? null,
            'telefono' => $proveedor->persona->telefono ?? null,
            'email' => $proveedor->persona->email ?? null,
            'dias_credito' => $proveedor->dias_credito,
            'credito_disponible' => $proveedor->credito_disponible,
            'estado' => $proveedor->estado,
        ];
    }
}
