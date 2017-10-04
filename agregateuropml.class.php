<?php
require_once('autoload.inc.php') ;

/**
 *  Agrégateur RSS nourri à partir de fichiers OPML
 */
class AgregateurOPML extends AgregateurRSS {
    /**
     *  Charger les flux d'un fichiers OPML
     * @param $fichier le nom du fichier à charger
     * @throws Exception quand le n'a pu être chargé
     */
    public function charger($fichier) {
    	return $fichier->
    }
}
