<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Countries",
    "action" => "getByRegion",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Airlines/add_edit', ['block' => 'scriptBottom']);
?><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Airline $airline
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Airlines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="airlines form large-9 medium-8 columns content">
    <?= $this->Form->create($airline) ?>
    <fieldset>
        <legend><?= __('Add Airline') ?></legend>
        <?php
            echo $this->Form->control('region_id', ['options' => $regions]);
            echo $this->Form->control('country_id', ['options' => [__('Please select a Region first')]]);
            echo $this->Form->control('code');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
