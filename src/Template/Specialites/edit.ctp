<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialite $specialite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Specialites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specialites form large-9 medium-8 columns content">
    <?= $this->Form->create($specialite) ?>
    <fieldset>
        <legend><?= __('Edit Specialite') ?></legend>
        <?php
            echo $this->Form->control('libelle');
            echo $this->Form->control('praticiens._ids', ['options' => $praticiens]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
