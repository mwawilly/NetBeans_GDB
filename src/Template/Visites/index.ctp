<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visite[]|\Cake\Collection\CollectionInterface $visites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visiteurs'), ['controller' => 'Visiteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visiteur'), ['controller' => 'Visiteurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Motifs'), ['controller' => 'Motifs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Motif'), ['controller' => 'Motifs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visites index large-9 medium-8 columns content">
    <h3><?= __('Visites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateVisite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('commentaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('praticien_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visiteur_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('motif_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visites as $visite): ?>
            <tr>
                <td><?= $this->Number->format($visite->id) ?></td>
                <td><?= h($visite->dateVisite) ?></td>
                <td><?= h($visite->commentaire) ?></td>
                <td><?= $visite->has('praticien') ? $this->Html->link($visite->praticien->label, ['controller' => 'Praticiens', 'action' => 'view', $visite->praticien->id]) : '' ?></td>
                <td><?= $visite->has('visiteur') ? $this->Html->link($visite->visiteur->label, ['controller' => 'Visiteurs', 'action' => 'view', $visite->visiteur->id]) : '' ?></td>
                <td><?= $visite->has('motif') ? $this->Html->link($visite->motif->libelle, ['controller' => 'Motifs', 'action' => 'view', $visite->motif->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visite->id)]) ?>
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
