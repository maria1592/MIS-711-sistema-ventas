<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var \App\Models\Categoria $categoria */
        $categoria = $this->resource;

        return [
            'id' => $categoria->id,
            'nombre' => $categoria->nombre,
            'descripcion' => $categoria->descripcion,
            'estado' => $categoria->estado,
        ];
    }
}
