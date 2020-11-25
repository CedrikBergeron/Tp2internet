<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight[]|\Cake\Collection\CollectionInterface $flights
 */
?>
<h2>Cédrik Bergeron</h2>
<h2>420-5b7 MO Applications internet</h2>
<h2>Automne 2020, Collège Montmorency</h2>
<p>Il est possible d'utiliser le site sur differents types d'appareils et la vue se mettera a jours automatiquement.</p>
<p>Il est possible d'afficher un vol en format pdf sur la page principale.</p>
<p>Un lien différent est donné lorsque connecté en administrateur</p>
<p>Possibilité de modifier et ajouter des régions en mode administrateur.</p>
<p>Menu en 1 page lors de l'affichage de la liste des régions.</p>
<p>Il est possible de lire et supprimer les région si elles ne sont pas liées à d'autres éléments</p>
<p>Lors de l'Ajout d'une compagnie aérienne, lors de la sélection de la région, une liste des pays de celle-ci apparait en dessous et se met a jour.</p>
<p>Lors de l'ajout d'un vol, il est possible d'écrire une partie du nom de la compagnie aérienne et toutes les compagnies avec un nom correspondant apparaiteront.</p>
<?php
echo $this->Html->link(
    $this->Html->image('diagramme.png',array('height' => '350', 'width' => '450')),
    array(
        'controller' => 'zones', 
        'action' => 'index'
    ), array('escape' => false)
);
?>
<a href="http://www.databaseanswers.org/data_models/travel_routes/index.htm">Base de donnée d'origine</a>

