<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight[]|\Cake\Collection\CollectionInterface $flights
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Flight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Airline'), ['controller' => 'Airlines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="flights index large-9 medium-8 columns content">
    <h3><?= __('Flights') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?= $flight->has('user') ? $this->Html->link($flight->user->email, ['controller' => 'Users', 'action' => 'view', $flight->user->id]) : '' ?></td>
                    <td><?= h($flight->title) ?></td>
                    <td><?= h($flight->modified) ?></td>
                    <td>
                        <?php
                        if (isset($flight->files[0])) {
                            echo $this->Html->image($flight->files[0]->path . $flight->files[0]->name, [
                                "alt" => $flight->files[0]->name,
                                "width" => "220px",
                                "height" => "150px",
                                'url' => ['controller' => 'Files', 'action' => 'view', $flight->files[0]->id]
                            ]);
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $flight->slug]) ?>
                        <?= $this->Html->link('(pdf)', ['action' => 'view', $flight->slug . '.pdf']) ?>

                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flight->slug]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->slug)]) ?>
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
