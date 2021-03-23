<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PraticiensSpecialite $praticiensSpecialite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $praticiensSpecialite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $praticiensSpecialite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Praticiens Specialites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialites'), ['controller' => 'Specialites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialite'), ['controller' => 'Specialites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="praticiensSpecialites form large-9 medium-8 columns content">
    <?= $this->Form->create($praticiensSpecialite) ?>
    <fieldset>
        <legend><?= __('Edit Praticiens Specialite') ?></legend>
        <?php
            echo $this->Form->control('praticien_id', ['options' => $praticiens, 'empty' => true]);
            echo $this->Form->control('specialite_id', ['options' => $specialites, 'empty' => true]);
            echo $this->Form->control('diplome');
            echo $this->Form->control('coefPres');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
