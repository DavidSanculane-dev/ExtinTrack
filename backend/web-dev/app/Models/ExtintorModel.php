<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line

class ExtintorModel extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'extintores';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'id_extintor';
}
