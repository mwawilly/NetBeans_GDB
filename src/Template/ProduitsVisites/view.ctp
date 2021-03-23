<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsVisite $produitsVisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produits Visite'), ['action' => 'edit', $produitsVisite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produits Visite'), ['action' => 'delete', $produitsVisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsVisite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produits Visites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produits Visite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produitsVisites view large-9 medium-8 columns content">
    <h3><?= h($produitsVisite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visite') ?></th>
            <td><?= $produitsVisite->has('visite') ? $this->Html->link($produitsVisite->visite->id, ['controller' => 'Visites', 'action' => 'view', $produitsVisite->visite->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $produitsVisite->has('produit') ? $this->Html->link($produitsVisite->produit->id, ['controller' => 'Produits', 'action' => 'view', $produitsVisite->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produitsVisite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantite') ?></th>
            <td><?= $this->Number->format($produitsVisite->quantite) ?></td>
        </tr>
    </table>
</div>
