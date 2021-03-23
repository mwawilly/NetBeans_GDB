<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialite[]|\Cake\Collection\CollectionInterface $specialites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Specialite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specialites index large-9 medium-8 columns content">
    <h3><?= __('Specialites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('libelle') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specialites as $specialite): ?>
            <tr>
                <td><?= $this->Number->format($specialite->id) ?></td>
                <td><?= h($specialite->libelle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specialite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specialite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialite->id)]) ?>
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
