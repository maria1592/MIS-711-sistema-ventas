<?php

namespace App\Http\Resources;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource; // ✅ Importar el modelo correcto

class ClienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Cliente $cliente */
        $cliente = $this->resource;

        return [
            'id' => $cliente->id,
            'codigo' => $cliente->codigo,
            'nombre' => $cliente->persona->nombre_completo ?? null,
            'telefono' => $cliente->persona->telefono ?? null,
            'email' => $cliente->persona->email ?? null,
            'dias_credito' => $cliente->dias_credito,
            'credito_disponible' => $cliente->credito_disponible,
            'estado' => $cliente->estado,
        ];
    }
}
