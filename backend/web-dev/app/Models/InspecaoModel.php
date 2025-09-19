<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspecaoModel extends Model
{
    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'inspecoes';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id_inspecao';
}
