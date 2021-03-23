<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialite $specialite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specialite'), ['action' => 'edit', $specialite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specialite'), ['action' => 'delete', $specialite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Specialites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens'), ['controller' => 'Praticiens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticien'), ['controller' => 'Praticiens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specialites view large-9 medium-8 columns content">
    <h3><?= h($specialite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Libelle') ?></th>
            <td><?= h($specialite->libelle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($specialite->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Praticiens') ?></h4>
        <?php if (!empty($specialite->praticiens)): ?>
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
            <?php foreach ($specialite->praticiens as $praticiens): ?>
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
