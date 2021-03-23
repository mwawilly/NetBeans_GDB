<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PraticiensSpecialite[]|\Cake\Collection\CollectionInterface $praticiensSpecialites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Praticiens Specialite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialites'), ['controller' => 'Specialites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialite'), ['controller' => 'Specialites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="praticiensSpecialites index large-9 medium-8 columns content">
    <h3><?= __('Praticiens Specialites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('praticien_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specialite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diplome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coefPres') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($praticiensSpecialites as $praticiensSpecialite): ?>
            <tr>
                <td><?= $this->Number->format($praticiensSpecialite->id) ?></td>
                <td><?= $praticiensSpecialite->has('praticien') ? $this->Html->link($praticiensSpecialite->praticien->id, ['controller' => 'Praticiens', 'action' => 'view', $praticiensSpecialite->praticien->id]) : '' ?></td>
                <td><?= $praticiensSpecialite->has('specialite') ? $this->Html->link($praticiensSpecialite->specialite->id, ['controller' => 'Specialites', 'action' => 'view', $praticiensSpecialite->specialite->id]) : '' ?></td>
                <td><?= h($praticiensSpecialite->diplome) ?></td>
                <td><?= $this->Number->format($praticiensSpecialite->coefPres) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $praticiensSpecialite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $praticiensSpecialite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $praticiensSpecialite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praticiensSpecialite->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
