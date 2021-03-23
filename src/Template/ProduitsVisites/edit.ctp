<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsVisite $produitsVisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produitsVisite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produitsVisite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produits Visites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsVisites form large-9 medium-8 columns content">
    <?= $this->Form->create($produitsVisite) ?>
    <fieldset>
        <legend><?= __('Edit Produits Visite') ?></legend>
        <?php
            echo $this->Form->control('visite_id', ['options' => $visites, 'empty' => true]);
            echo $this->Form->control('produit_id', ['options' => $produits, 'empty' => true]);
            echo $this->Form->control('quantite');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
