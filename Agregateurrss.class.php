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
        $rss = new DOMDocument();
        $rss->load($url);
        foreach($rss->getElementsByTagName("item") as $item){
            $this->_elements[] = new Elementrss($rss->getElementsByTagName("title")->item(0)->firstChild->nodeValue, $item);
        }

    }

    /**
     * Production de la liste des éléments en HTML
     *
     * @return string le code HTML
     */
    public function toHTML() {
        $html = "";
        foreach($this->_elements as $e){
           $html .= <<<HTML
                    <div class="RSS">
                        <span class="date"> {$e->date()} </span>
                        <span class="flux"> {$e->flux()} </span>
                        <span class="lien"> <a href="{$e->url()}"> {$e->titre()} </a></span>
                    </div>\n
HTML;
        }

            return $html;
    }


    /**
     * Tri des éléments par nom de flux source
     *
     * @return void
     */
    public function triFlux() {
        return uasort($this->_elements, array('Elementrss', 'compareFlux'));
    }

    /**
     * Tri des éléments par titre
     *
     * @return void
     */
    public function triTitre() {
        return uasort($this->_elements, array('Elementrss', 'compareTitre'));
    }

    /**
     * Tri des éléments par date
     *
     * @return void
     */
    public function triDate() {
        return uasort($this->_elements, array('Elementrss', 'compareDate'));
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
