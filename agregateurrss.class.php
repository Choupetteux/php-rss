<?php
require_once('autoload.inc.php') ;

/**
 * Agrégateur de flux RSS
 */
class AgregateurRSS {
    /**
     * Tableau des éléments de flux RSS = tableau d'instances de ElementRSS
     * @var ElementRSS[]
     */
    protected $_elements = array() ;

    /**
     * Ajouter un flux RSS à l'agrégateur
     * @param $url l'URL du flux à ajouter
     *
     * @throws Exception quand le flux ne peut pas être chargé
     * @return void
     */
    public function ajouterFlux($url) {
        // Explorer tous les éléments <item> afin de construire un ElementRSS pour chacun d'eux
    }

    /**
     * Production de la liste des éléments en HTML
     *
     * @return string le code HTML
     */
    public function toHTML() {
    }

    /**
     * Tri des éléments par nom de flux source
     *
     * @return void
     */
    public function triFlux() {
    }

    /**
     * Tri des éléments par titre
     *
     * @return void
     */
    public function triTitre() {
    }

    /**
     * Tri des éléments par date
     *
     * @return void
     */
    public function triDate() {
    }

    /**
     * Production d'un flux RSS
     * @param $title le titre du flux
     * @param $description la description du flux
     * @param $max le nNombre maximal d'éléments dans le flux (0 = tous)
     *
     * @return string le code XML du nouveau flux RSS
     */
    public function RSS($title, $description, $max=0) {
    }
}
