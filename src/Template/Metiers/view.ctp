<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metier $metier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Metier'), ['action' => 'edit', $metier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Metier'), ['action' => 'delete', $metier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Metiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="metiers view large-9 medium-8 columns content">
    <h3><?= h($metier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Libelle') ?></th>
            <td><?= h($metier->libelle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($metier->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Praticiens') ?></h4>
        <?php if (!empty($metier->praticiens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Prenom') ?></th>
                <th scope="col"><?= __('Tel') ?></th>
                <th scope="col"><?= __('Mail') ?></th>
                <th scope="col"><?= __('Rue') ?></th>
                <th scope="col"><?= __('CodePostal') ?></th>
                <th scope="col"><?= __('Ville') ?></th>
                <th scope="col"><?= __('CoefNotoriete') ?></th>
                <th scope="col"><?= __('Metier Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($metier->praticiens as $praticiens): ?>
            <tr>
                <td><?= h($praticiens->id) ?></td>
                <td><?= h($praticiens->nom) ?></td>
                <td><?= h($praticiens->prenom) ?></td>
                <td><?= h($praticiens->tel) ?></td>
                <td><?= h($praticiens->mail) ?></td>
                <td><?= h($praticiens->rue) ?></td>
                <td><?= h($praticiens->codePostal) ?></td>
                <td><?= h($praticiens->ville) ?></td>
                <td><?= h($praticiens->coefNotoriete) ?></td>
                <td><?= h($praticiens->metier_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Praticiens', 'action' => 'view', $praticiens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Praticiens', 'action' => 'edit', $praticiens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Praticiens', 'action' => 'delete', $praticiens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praticiens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
