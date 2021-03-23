<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Famille $famille
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Familles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="familles form large-9 medium-8 columns content">
    <?= $this->Form->create($famille) ?>
    <fieldset>
        <legend><?= __('Add Famille') ?></legend>
        <?php
            echo $this->Form->control('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
