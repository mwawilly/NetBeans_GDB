<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metier $metier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $metier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $metier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Metiers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metiers form large-9 medium-8 columns content">
    <?= $this->Form->create($metier) ?>
    <fieldset>
        <legend><?= __('Edit Metier') ?></legend>
        <?php
            echo $this->Form->control('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
