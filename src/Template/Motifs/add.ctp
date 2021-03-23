<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Motif $motif
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Motifs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="motifs form large-9 medium-8 columns content">
    <?= $this->Form->create($motif) ?>
    <fieldset>
        <legend><?= __('Add Motif') ?></legend>
        <?php
            echo $this->Form->control('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
