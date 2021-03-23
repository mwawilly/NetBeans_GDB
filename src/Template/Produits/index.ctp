<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produit[]|\Cake\Collection\CollectionInterface $produits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Familles'), ['controller' => 'Familles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famille'), ['controller' => 'Familles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produits index large-9 medium-8 columns content">
    <h3><?= __('Produits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('libelle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prixIndicatif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numeroDepot') ?></th>
                <th scope="col"><?= $this->Paginator->sort('famille_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= $this->Number->format($produit->id) ?></td>
                <td><?= h($produit->libelle) ?></td>
                <td><?= $this->Number->format($produit->prixIndicatif) ?></td>
                <td><?= $this->Number->format($produit->numeroDepot) ?></td>
                <td><?= $produit->has('famille') ? $this->Html->link($produit->famille->libelle, ['controller' => 'Familles', 'action' => 'view', $produit->famille->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produit->id)]) ?>
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
