<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visite $visite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visite'), ['action' => 'edit', $visite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visite'), ['action' => 'delete', $visite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visiteurs'), ['controller' => 'Visiteurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visiteur'), ['controller' => 'Visiteurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Motifs'), ['controller' => 'Motifs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Motif'), ['controller' => 'Motifs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visites view large-9 medium-8 columns content">
    <h3><?= h($visite->commentaire) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Commentaire') ?></th>
            <td><?= h($visite->commentaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Praticien') ?></th>
            <td><?= $visite->has('praticien') ? $this->Html->link($visite->praticien->label, ['controller' => 'Praticiens', 'action' => 'view', $visite->praticien->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visiteur') ?></th>
            <td><?= $visite->has('visiteur') ? $this->Html->link($visite->visiteur->label, ['controller' => 'Visiteurs', 'action' => 'view', $visite->visiteur->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Motif') ?></th>
            <td><?= $visite->has('motif') ? $this->Html->link($visite->motif->libelle, ['controller' => 'Motifs', 'action' => 'view', $visite->motif->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($visite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DateVisite') ?></th>
            <td><?= h($visite->dateVisite) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produits') ?></h4>
        <?php if (!empty($visite->produits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Libelle') ?></th>
                <th scope="col"><?= __('PrixIndicatif') ?></th>
                <th scope="col"><?= __('NumeroDepot') ?></th>
                <th scope="col"><?= __('Famille Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($visite->produits as $produits): ?>
            <tr>
                <td><?= h($produits->id) ?></td>
                <td><?= h($produits->libelle) ?></td>
                <td><?= h($produits->prixIndicatif) ?></td>
                <td><?= h($produits->numeroDepot) ?></td>
                <td><?= h($produits->famille_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produits', 'action' => 'view', $produits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produits', 'action' => 'edit', $produits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produits', 'action' => 'delete', $produits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
