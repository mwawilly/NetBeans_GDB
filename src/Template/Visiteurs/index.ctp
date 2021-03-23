<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visiteur[]|\Cake\Collection\CollectionInterface $visiteurs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visiteur'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visites'), ['controller' => 'Visites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visite'), ['controller' => 'Visites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visiteurs index large-9 medium-8 columns content">
    <h3><?= __('Visiteurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matricule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateEmbauche') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visiteurs as $visiteur): ?>
            <tr>
                <td><?= $this->Number->format($visiteur->id) ?></td>
                <td><?= $this->Number->format($visiteur->matricule) ?></td>
                <td><?= h($visiteur->username) ?></td>
                <td><?= h($visiteur->password) ?></td>
                <td><?= h($visiteur->nom) ?></td>
                <td><?= h($visiteur->prenom) ?></td>
                <td><?= h($visiteur->tel) ?></td>
                <td><?= h($visiteur->mail) ?></td>
                <td><?= h($visiteur->dateEmbauche) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visiteur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visiteur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visiteur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visiteur->id)]) ?>
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
