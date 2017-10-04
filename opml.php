<?php
require_once('autoload.inc.php') ;

$p = new WebPage("Agrégation de flux RSS") ;
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
    // Construction de l'agrégateur
    $a = new AgregateurOPML() ;
    // Chargement des flux contenus dans un fichier OPML
    $a->charger('flux.opml') ;
    // Tri des éléments agrégés par date
    $a->triDate() ;
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