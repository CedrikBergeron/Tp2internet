<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight $flight
 */
?>
<div class="flights view large-9 medium-8 columns content">
    <h3><?= h($flight->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $flight->has('user') ? $this->Html->link($flight->user->email, ['controller' => 'Users', 'action' => 'view', $flight->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($flight->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($flight->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Airline') ?></th>
            <td><?= h($flight->airline['name']) ?></td>
        </tr>
<!--        <tr>
            <th scope="row"><?php //__('Id')   ?></th>
            <td><?php //$this->Number->format($flight->id)   ?></td>
        </tr>
        -->        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($flight->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($flight->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $flight->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($flight->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($flight->tags)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($flight->tags as $tags): ?>
                    <tr>
                        <td><?= h($tags->id) ?></td>
                        <td><?= h($tags->title) ?></td>
                        <td><?= h($tags->created) ?></td>
                        <td><?= h($tags->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($flight->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <?php foreach ($flight->files as $files): ?>
                    <tr>
                        <td>    
                            <?php
                            echo $this->Html->image($files->path . $files->name, [
                                "alt" => $files->name,
                            ]);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Related Bookings') ?></h4>
        <?php if (!empty($flight->bookings)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Flight Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Booking') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($flight->bookings as $bookings): ?>
                    <tr>
                        <td><?= h($bookings->id) ?></td>
                        <td><?= h($bookings->flight_id) ?></td>
                        <td><?= h($bookings->name) ?></td>
                        <td><?= h($bookings->booking) ?></td>
                        <td><?= h($bookings->created) ?></td>
                        <td><?= h($bookings->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookings->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
