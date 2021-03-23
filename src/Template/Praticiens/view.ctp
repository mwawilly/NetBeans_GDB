<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Praticien $praticien
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Praticien'), ['action' => 'edit', $praticien->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Praticien'), ['action' => 'delete', $praticien->id], ['confirm' => __('Are you sure you want to delete # {0}?', $praticien->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Praticiens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Praticien'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Metiers'), ['controller' => 'Metiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metier'), ['controller' => 'Metiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialites'), ['controller' => 'Specialites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialite'), ['controller' => 'Specialites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="praticiens view large-9 medium-8 columns content">
    <h3><?= h($praticien->label) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($praticien->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($praticien->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($praticien->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td><?= h($praticien->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rue') ?></th>
            <td><?= h($praticien->rue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CodePostal') ?></th>
            <td><?= h($praticien->codePostal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($praticien->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Metier') ?></th>
            <td><?= $praticien->has('metier') ? $this->Html->link($praticien->metier->libelle, ['controller' => 'Metiers', 'action' => 'view', $praticien->metier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($praticien->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CoefNotoriete') ?></th>
            <td><?= $this->Number->format($praticien->coefNotoriete) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Specialites') ?></h4>
        <?php if (!empty($praticien->specialites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Libelle') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($praticien->specialites as $specialites): ?>
            <tr>
                <td><?= h($specialites->id) ?></td>
                <td><?= h($specialites->libelle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Specialites', 'action' => 'view', $specialites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Specialites', 'action' => 'edit', $specialites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specialites', 'action' => 'delete', $specialites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Visites') ?></h4>
        <?php if (!empty($praticien->visites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('DateVisite') ?></th>
                <th scope="col"><?= __('Commentaire') ?></th>
                <th scope="col"><?= __('Praticien Id') ?></th>
                <th scope="col"><?= __('Visiteur Id') ?></th>
                <th scope="col"><?= __('Motif Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($praticien->visites as $visites): ?>
            <tr>
                <td><?= h($visites->id) ?></td>
                <td><?= h($visites->dateVisite) ?></td>
                <td><?= h($visites->commentaire) ?></td>
                <td><?= h($visites->praticien_id) ?></td>
                <td><?= h($visites->visiteur_id) ?></td>
                <td><?= h($visites->motif_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visites', 'action' => 'view', $visites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visites', 'action' => 'edit', $visites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visites', 'action' => 'delete', $visites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
