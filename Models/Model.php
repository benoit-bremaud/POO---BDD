<?php
namespace App\Models;

use App\Db\Db;

class Model extends Db
{
    // Table de la BDD
    protected $table;

    // Instance de Db
    private $db;
    

    // Trouve tous les éléments de ma table !
    public function findAll()
    {   
        $query = $this->query('SELECT * FROM '. $this->table);
        return $query->fetchAll();
    }


    public function query(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if ($attributs !== null) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            // Requête simple
            return $this->db->query($sql);
        }
    }
    
}
