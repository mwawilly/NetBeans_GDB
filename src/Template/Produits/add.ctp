<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produit $produit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Familles'), ['controller' => 'Familles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famille'), ['controller' => 'Familles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produits form large-9 medium-8 columns content">
    <?= $this->Form->create($produit) ?>
    <fieldset>
        <legend><?= __('Add Produit') ?></legend>
        <?php
            echo $this->Form->control('libelle');
            echo $this->Form->control('prixIndicatif');
            echo $this->Form->control('numeroDepot');
            echo $this->Form->control('famille_id', ['options' => $familles, 'empty' => true]);
            echo $this->Form->control('visites._ids', ['options' => $visites]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
