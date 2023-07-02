<?php
namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        // On récupère dans $class la totalité du namespace de la classe concernée (App\Client\Compte) le transformer en (Client/Compte.php)
        // On retire "App\" graàce à la constante magique __namespace__
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        // On remplace les '\' par des '/' tout ça écrire le chemin d'acces à nos fichiers
        $class = str_replace('\\', '/', $class);

        // Permet d'afficher le chemin d'acces complet à notre fichier
        // echo __DIR__ . '/' . $class . '.php';

        $fichier = __DIR__ . '/' . $class . '.php';
        // On vérifie si le fichier existe
        if (file_exists($fichier))
        {
            require_once $fichier;
        }
    }
}
