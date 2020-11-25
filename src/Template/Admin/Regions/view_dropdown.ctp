<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id], ['class' => 'nav-link']) ?>
<?= $this->Form->postLink( __('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id), 'class' => 'nav-link'] ) ?>
<?= $this->Html->link(__('List Regions'), ['action' => 'index'], ['class' => 'nav-link']) ?> 
<?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'nav-link']) ?> 
<?= $this->Html->link(__('List Airlines'), ['controller' => 'Airlines', 'action' => 'index'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('New Airline'), ['controller' => 'Airlines', 'action' => 'add'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('List countries'), ['controller' => 'Countries', 'action' => 'index'], ['class' => 'nav-link']) ?>
<?= $this->Html->link(__('New country'), ['controller' => 'Countries', 'action' => 'add'], ['class' => 'nav-link']) ?>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', $this->fetch('tb_actions')); ?>

<div class="regions view large-9 medium-8 columns content">
    <h3><?= h($region->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Code') ?></th>
                <td><?= h($region->code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('name') ?></th>
                <td><?= h($region->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($region->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Airlines') ?></h4>
        <?php if (!empty($region->airlines)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Region Id') ?></th>
                    <th scope="col"><?= __('country Id') ?></th>
                    <th scope="col"><?= __('Code') ?></th>
                    <th scope="col"><?= __('name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($region->airlines as $airlines): ?>
                <tr>
                    <td><?= h($airlines->id) ?></td>
                    <td><?= h($airlines->region_id) ?></td>
                    <td><?= h($airlines->country_id) ?></td>
                    <td><?= h($airlines->code) ?></td>
                    <td><?= h($airlines->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Airlines', 'action' => 'view', $airlines->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Airlines', 'action' => 'edit', $airlines->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Airlines', 'action' => 'delete', $airlines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airlines->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related countries') ?></h4>
        <?php if (!empty($region->countries)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Region Id') ?></th>
                    <th scope="col"><?= __('Code') ?></th>
                    <th scope="col"><?= __('name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($region->countries as $countries): ?>
                <tr>
                    <td><?= h($countries->id) ?></td>
                    <td><?= h($countries->region_id) ?></td>
                    <td><?= h($countries->code) ?></td>
                    <td><?= h($countries->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Countries', 'action' => 'view', $countries->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Countries', 'action' => 'edit', $countries->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Countries', 'action' => 'delete', $countries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countries->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
