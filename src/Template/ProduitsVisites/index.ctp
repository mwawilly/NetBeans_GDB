<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsVisite[]|\Cake\Collection\CollectionInterface $produitsVisites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produits Visite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsVisites index large-9 medium-8 columns content">
    <h3><?= __('Produits Visites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantite') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produitsVisites as $produitsVisite): ?>
            <tr>
                <td><?= $this->Number->format($produitsVisite->id) ?></td>
                <td><?= $produitsVisite->has('visite') ? $this->Html->link($produitsVisite->visite->id, ['controller' => 'Visites', 'action' => 'view', $produitsVisite->visite->id]) : '' ?></td>
                <td><?= $produitsVisite->has('produit') ? $this->Html->link($produitsVisite->produit->id, ['controller' => 'Produits', 'action' => 'view', $produitsVisite->produit->id]) : '' ?></td>
                <td><?= $this->Number->format($produitsVisite->quantite) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produitsVisite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produitsVisite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produitsVisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsVisite->id)]) ?>
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
