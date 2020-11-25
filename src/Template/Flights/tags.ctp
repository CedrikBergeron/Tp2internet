<h1>
    Flights tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
<?php foreach ($flights as $flight): ?>
    <flight>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link(
            $flight->title,
            ['controller' => 'Flights', 'action' => 'view', $flight->slug]
        ) ?></h4>
        <span><?= h($flight->created) ?></span>
    </flight>
<?php endforeach; ?>
</section>
