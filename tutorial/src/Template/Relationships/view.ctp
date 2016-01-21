<?= $this->element('side_menu') ?>

<div class="relationships view large-9 medium-8 columns content">
     <ul>
        <li><?= $this->Html->link(__('Edit Relationship'), ['action' => 'edit', $relationship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relationship'), ['action' => 'delete', $relationship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id)]) ?> </li>
    </ul>
    <h3><?= h($relationship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($relationship->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Follower Id') ?></th>
            <td><?= $this->Number->format($relationship->follower_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Followed Id') ?></th>
            <td><?= $this->Number->format($relationship->followed_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Count') ?></th>
            <td><?= $this->Number->format($relationship->count) ?></td>
        </tr>
    </table>
</div>
