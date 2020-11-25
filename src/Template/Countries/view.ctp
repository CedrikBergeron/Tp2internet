<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airlines'), ['controller' => 'Airlines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airline'), ['controller' => 'Airlines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $country->has('region') ? $this->Html->link($country->region->id, ['controller' => 'Regions', 'action' => 'view', $country->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($country->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('name') ?></th>
            <td><?= h($country->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Airlines') ?></h4>
        <?php if (!empty($country->airlines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('country Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->airlines as $airlines): ?>
            <tr>
                <td><?= h($airlines->id) ?></td>
                <td><?= h($airlines->region_id) ?></td>
                <td><?= h($airlines->country_id) ?></td>
                <td><?= h($airlines->code) ?></td>
                <td><?= h($airlines->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Airlines', 'action' => 'view', $airlines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Airlines', 'action' => 'edit', $airlines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Airlines', 'action' => 'delete', $airlines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airlines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
