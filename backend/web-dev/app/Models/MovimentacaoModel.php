<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoModel extends Model
{
    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'movimentacoes';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id_movimentacao';
}
