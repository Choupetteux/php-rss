<?php
require_once('autoload.inc.php') ;
/**
 *  Elément de flux RSS
 */
class ElementRSS {
    /**
     *  Titre du flux source
     *  @var string
     */
    private $_flux ;
    /**
     *  Titre de l'élément
     *  @var string
     */
    private $_titre ;
    /**
     *  URL associée à l'élément
     *  @var string
     */
    private $_url ;
    /**
     *  Date de publication sous forme de timestamp
     *  @var int
     */
    private $_date ;

    /** Rechercher la valeur d'une balise fille d'un noeud DOM
     * @param $node le noeud DOM à partir duquel la recherche doit être lancée
     * @param $nodeName le nom du noeud cherché
     * @throws Exception quand la balise n'a pu être trouvée
     *
     * @return string la valeur
     */
    public static function valeurElement(DOMElement $node, $nodeName) {
        $list = $node->getElementsByTagName($nodeName) ;
        if ($list->length == 1) {
            return $list->item(0)->firstChild->nodeValue ;
            // return $list->item(0)->nodeValue ; // Fonctionne par "abus de langage" mais ne devrait pas !
        }
        else {
            throw new Exception("La balise '$nodeName' n'a pu être trouvée dans les descendants de '{$node->tagName}'") ;
        }
    }

    /** Constructeur
     * @param $titre_flux le titre (title) du flux source
     * @param $node le noeud DOM source
     */
    public function __construct($titre_flux, DOMelement $node) {
    }

    /** Accès au nom du flux
     *
     * @return string le nom du flux
     */
    public function flux() {
    }

    /** Accès au titre de l'élément
     *
     * @return string le titre de l'élément
     */
    public function titre() {
    }

    /** Accès à l'URL de l'élément
     *
     * @return string l'URL de l'élément
     */
    public function url() {
    }

    /** Accès à la date de publication de l'élément sous forme de timestamp
     *
     * @return int le timestamp de l'élément
     */
    public function timestamp() {
    }

    /** Accès à la date de publication de l'élément sous forme de texte
     *
     * @return string la date de l'élément sous forme de date
     */
    public function date() {
    }

    /** Comparaison alphabétique des noms des flux de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareFlux(self $n1, self $n2) {
    }

    /** Comparaison alphabétique des titres de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareTitre(self $n1, self $n2) {
    }

    /** Comparaison chronologique inverse des dates de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareDate(self $n1, self $n2) {
    }
}
