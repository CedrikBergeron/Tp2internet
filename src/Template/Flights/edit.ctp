<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight $flight
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?=
            $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $flight->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="flights form large-9 medium-8 columns content">
<?= $this->Form->create($flight) ?>
    <fieldset>
        <legend><?= __('Edit Flight') ?></legend>
        <?php
        echo $this->Form->control('user_id', ['type' => 'hidden']);
        echo $this->Form->control('title');
        echo $this->Form->control('airline_id', ['options' => $airlines]);
//            echo $this->Form->control('slug');
        echo $this->Form->control('body');
        echo $this->Form->control('published');
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
