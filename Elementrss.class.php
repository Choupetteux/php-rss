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
        $this->_flux = $titre_flux;
        $this->_titre = self::valeurElement($node, 'title');
        $this->_url = self::valeurElement($node, 'link');
        try{
            $this->_date = strtotime(self::valeurElement($node, 'pubDate')); 
        }
        catch(Exception $e){

        }
    }


    /** Accès au nom du flux
     *
     * @return string le nom du flux
     */
    public function flux() {
        return $this->_flux;
    }

    /** Accès au titre de l'élément
     *
     * @return string le titre de l'élément
     */
    public function titre() {
        return $this->_titre;
    }

    /** Accès à l'URL de l'élément
     *
     * @return string l'URL de l'élément
     */
    public function url() {
        return $this->_url;
    }

    /** Accès à la date de publication de l'élément sous forme de timestamp
     *
     * @return int le timestamp de l'élément
     */
    public function timestamp() {
        return $this->_date;
    }

    /** Accès à la date de publication de l'élément sous forme de texte
     *
     * @return string la date de l'élément sous forme de date
     */
    public function date() {
        return strftime('%d/%m/%y %H:%M', $this->_date); 
    }

    /** Comparaison alphabétique des noms des flux de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareFlux(self $n1, self $n2) {
        if($n1->_flux < $n2->_flux){
            return -1;
        }
        elseif($n1->_flux > $n2->_flux){
            return 1;
        }
        elseif($n1->_flux == $n2->_flux){
            return 0;
        }
    }

    /** Comparaison alphabétique des titres de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareTitre(self $n1, self $n2) {
        if($n1->_titre < $n2->_titre){
            return -1;
        }
        elseif($n1->_titre > $n2->_titre){
            return 1;
        }
        elseif($n1->_titre == $n2->_titre){
            return 0;
        }
    }

    /** Comparaison chronologique inverse des dates de deux éléments
     * @param ElementRSS $n1 le premier opérande de la comparaison
     * @param ElementRSS $n2 le second opérande de la comparaison
     *
     * @return int 0, -1 ou 1
     */
    public static function compareDate(self $n1, self $n2) {
        if(mktime($n1->_date) > mktime($n2->_date)){
            return -1;
        }
        elseif(mktime($n1->_date) < mktime($n2->_date)){
            return 1;
        }
        elseif(mktime($n1->_date) == mktime($n2->_date)){
            return 0;
        }
    }


}
