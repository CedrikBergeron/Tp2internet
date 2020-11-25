<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Airline $airline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Airline'), ['action' => 'edit', $airline->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Airline'), ['action' => 'delete', $airline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airline->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Airlines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airline'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="airlines view large-9 medium-8 columns content">
    <h3><?= h($airline->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $airline->has('region') ? $this->Html->link($airline->region->id, ['controller' => 'Regions', 'action' => 'view', $airline->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('country') ?></th>
            <td><?= $airline->has('country') ? $this->Html->link($airline->country->id, ['controller' => 'Countries', 'action' => 'view', $airline->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($airline->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('name') ?></th>
            <td><?= h($airline->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($airline->id) ?></td>
        </tr>
    </table>
</div>
