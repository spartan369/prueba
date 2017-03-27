<?php

namespace App\Repositories;

use App\Bitacora;

class BitacoraRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function RepBitacora($nombre_dominio)
    {
        return Bitacora::where('nombre', $nombre_dominio)
                    ->orderBy('id_dominio', 'asc')
                    ->get();
    }
}