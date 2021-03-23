<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visiteur $visiteur
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visiteur->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visiteur->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visiteurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visiteurs form large-9 medium-8 columns content">
    <?= $this->Form->create($visiteur) ?>
    <fieldset>
        <legend><?= __('Edit Visiteur') ?></legend>
        <?php
            echo $this->Form->control('matricule');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('tel');
            echo $this->Form->control('mail');
            echo $this->Form->control('dateEmbauche', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
