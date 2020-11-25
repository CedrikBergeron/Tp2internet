<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Airline[]|\Cake\Collection\CollectionInterface $airlines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Airline'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="airlines index large-9 medium-8 columns content">
    <h3><?= __('Airlines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($airlines as $airline): ?>
            <tr>
                <td><?= $this->Number->format($airline->id) ?></td>
                <td><?= $airline->has('region') ? $this->Html->link($airline->region->id, ['controller' => 'Regions', 'action' => 'view', $airline->region->id]) : '' ?></td>
                <td><?= $airline->has('country') ? $this->Html->link($airline->country->id, ['controller' => 'Countries', 'action' => 'view', $airline->country->id]) : '' ?></td>
                <td><?= h($airline->code) ?></td>
                <td><?= h($airline->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $airline->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $airline->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $airline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airline->id)]) ?>
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
