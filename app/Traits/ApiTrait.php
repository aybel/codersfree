<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;


trait ApiTrait{
    public function scopeInclude(Builder $query)
    {
        if (!empty(request('include'))) {

            $relaciones = explode(',', request('include'));

            $allowInclude = collect($this->allRelaciones);
            //Log::debug($allowInclude);
            //Log::debug($relaciones);

            foreach ($relaciones as $key => $relacionPermitida) {
                //Log::debug($relacionPermitida);
                if (!$allowInclude->contains($relacionPermitida)) {
                    unset($relaciones[$key]);
                }
            }

            $query->with($relaciones); //posts,relacion2
        }
    }

    public function scopeFiltro(Builder $query)
    {
        if (!empty(request('filtro'))) {
            $filtros = request('filtro');

            $filtrosPermitidos = collect($this->allFiltros);
            //Log::debug($filtrosPermitidos);
            foreach ($filtros as $filtro => $valorfiltro) {
                // Log::debug($filtro);
                // Log::debug($valorfiltro);
                if ($filtrosPermitidos->contains($filtro)) {
                    $query->where(trim($filtro), 'LIKE', "%" . trim($valorfiltro) . "%");
                }
            }
        }
    }

    public function scopeOrdenar(Builder $consulta)
    {
        $order = request('ordenar');
        if (!empty($order)) {
            $arrayOrder = explode(',', $order);
            $allOrders = collect($this->allOrders);
            foreach ($arrayOrder as $campoOrder) {
                //Log::debug($campoOrder);
                $direccion = "asc";
                if (substr($campoOrder, 0, 1) == '-') {

                    Log::debug(ltrim($campoOrder, '-'));
                    $auxCampo = ltrim($campoOrder, '-');
                    if ($allOrders->contains($auxCampo)) {
                        $consulta->orderBY($auxCampo, 'desc');
                    }
                } else {
                    if ($allOrders->contains($campoOrder)) {
                        $consulta->orderBY($campoOrder, 'asc');
                    }
                }
                //Log::debug($direccion);
            }
        }
    }
    public function scopeGetPaginate(Builder $consulta)
    {
        //Log::debug(request('perPage'));
        if (request('perPage')) {
            $perPage = intVal(request('perPage'));
            if ($perPage) {
                return $consulta->paginate($perPage);
            }
        }

        return $consulta->get();
    }
}
