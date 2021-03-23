<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visite $visite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visiteurs'), ['controller' => 'Visiteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visiteur'), ['controller' => 'Visiteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Motifs'), ['controller' => 'Motifs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Motif'), ['controller' => 'Motifs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visites form large-9 medium-8 columns content">
    <?= $this->Form->create($visite) ?>
    <fieldset>
        <legend><?= __('Add Visite') ?></legend>
        <?php
            echo $this->Form->control('dateVisite', ['empty' => true]);
            echo $this->Form->control('commentaire');
            echo $this->Form->control('praticien_id', ['options' => $praticiens, 'empty' => true]);
            echo $this->Form->control('visiteur_id', ['options' => $visiteurs, 'empty' => true]);
            echo $this->Form->control('motif_id', ['options' => $motifs, 'empty' => true]);
            echo $this->Form->control('produits._ids', ['options' => $produits]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
