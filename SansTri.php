<?php
require_once('autoload.inc.php') ;

$p = new Webpage("Agrégation de flux RSS") ;
$p->appendCSS(<<<CSS
          .rss a:link, .rss a:visited {
              text-decoration : none ;
          }

          .rss a:link:hover {
              text-decoration : underline ;
          }

          .rss .flux {
              font-weight : bold ;
          }
CSS
) ;

try {
    // Tableau contenant les noms des fichiers source
    $url = array(
                 'http://www.bfmtv.com/rss/societe/',
                 'http://www.generation-nt.com/export/rss.xml',
                 'http://www.clubic.com/xml/news.xml',
                 ) ;

    // Construction de l'agrégateur
    $a = new Agregateurrss() ;
    // Parcours des noms des fichiers RSS
    foreach ($url as $u) {
        // Ajout à l'agrégateur
        $a->ajouterFlux($u) ;
    }
    // Mise en forme HTML des éléments
    $p->appendContent($a->toHTML()) ;
}
catch (Exception $e) {
    $p->appendContent(<<<HTML
    <h1>Exception rencontrée</h1>
    <em>{$e->getMessage()}</em>
    <div id='trace'>Trace :
    <pre>
{$e->getTraceAsString()}
    </pre>
    </div>
HTML
) ;
}

// Envoi au client
echo $p->toHTML() ;