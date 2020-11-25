<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight $flight
 */
?>
<?php
$urlToAirlinesAutocompletedemoJson = $this->Url->build([
    "controller" => "Airlines",
    "action" => "findAirlines",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToAirlinesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Flights/add_edit/airlineAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Flight') ?></legend>
        <?php
//            echo $this->Form->control('user_id', ['options' => $users]);
        echo $this->Form->control('title');
//            echo $this->Form->control('slug');
        echo $this->Form->control('airline_id', ['label' => __('Airline'), 'type' => 'text', 'id' => 'autocomplete']);
//        echo $this->Form->control('airline_id', ['options' => $airlines]);
        echo $this->Form->control('body');
        echo $this->Form->control('published');
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
