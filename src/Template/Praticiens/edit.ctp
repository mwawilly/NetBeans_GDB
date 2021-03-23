<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Praticien $praticien
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $praticien->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $praticien->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Metiers'), ['controller' => 'Metiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Metier'), ['controller' => 'Metiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialites'), ['controller' => 'Specialites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialite'), ['controller' => 'Specialites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="praticiens form large-9 medium-8 columns content">
    <?= $this->Form->create($praticien) ?>
    <fieldset>
        <legend><?= __('Edit Praticien') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('tel');
            echo $this->Form->control('mail');
            echo $this->Form->control('rue');
            echo $this->Form->control('codePostal');
            echo $this->Form->control('ville');
            echo $this->Form->control('coefNotoriete');
            echo $this->Form->control('metier_id', ['options' => $metiers, 'empty' => true]);
            echo $this->Form->control('specialites._ids', ['options' => $specialites]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
