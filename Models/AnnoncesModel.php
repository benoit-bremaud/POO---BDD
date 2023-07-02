<?php
namespace App\Models;

class AnnoncesModel extends Model
{
    // Un constructeur
    public function __construct()
    {
        $this->table = 'annonces';
    }
}