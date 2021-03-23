<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Famille $famille
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famille'), ['action' => 'edit', $famille->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famille'), ['action' => 'delete', $famille->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famille->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Familles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famille'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="familles view large-9 medium-8 columns content">
    <h3><?= h($famille->labelle) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Libelle') ?></th>
            <td><?= h($famille->libelle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famille->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produits') ?></h4>
        <?php if (!empty($famille->produits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Libelle') ?></th>
                <th scope="col"><?= __('PrixIndicatif') ?></th>
                <th scope="col"><?= __('NumeroDepot') ?></th>
                <th scope="col"><?= __('Famille Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($famille->produits as $produits): ?>
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
