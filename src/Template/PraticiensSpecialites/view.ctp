<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PraticiensSpecialite $praticiensSpecialite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Praticiens Specialite'), ['action' => 'edit', $praticiensSpecialite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Praticiens Specialite'), ['action' => 'delete', $praticiensSpecialite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praticiensSpecialite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens Specialites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticiens Specialite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialites'), ['controller' => 'Specialites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialite'), ['controller' => 'Specialites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="praticiensSpecialites view large-9 medium-8 columns content">
    <h3><?= h($praticiensSpecialite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Praticien') ?></th>
            <td><?= $praticiensSpecialite->has('praticien') ? $this->Html->link($praticiensSpecialite->praticien->id, ['controller' => 'Praticiens', 'action' => 'view', $praticiensSpecialite->praticien->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specialite') ?></th>
            <td><?= $praticiensSpecialite->has('specialite') ? $this->Html->link($praticiensSpecialite->specialite->id, ['controller' => 'Specialites', 'action' => 'view', $praticiensSpecialite->specialite->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diplome') ?></th>
            <td><?= h($praticiensSpecialite->diplome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($praticiensSpecialite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CoefPres') ?></th>
            <td><?= $this->Number->format($praticiensSpecialite->coefPres) ?></td>
        </tr>
    </table>
</div>
