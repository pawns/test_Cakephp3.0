<?= $this->element('side_menu') ?>

<div class="relationships index large-9 medium-8 columns content">
    <h3><?= __('Relationships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('follower_id') ?></th>
                <th><?= $this->Paginator->sort('followed_id') ?></th>
                <th><?= $this->Paginator->sort('count') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($relationships as $relationship): ?>
            <tr>
                <td><?= $this->Number->format($relationship->id) ?></td>
                <td><?= $this->Number->format($relationship->follower_id) ?></td>
                <td><?= $this->Number->format($relationship->followed_id) ?></td>
                <td><?= $this->Number->format($relationship->count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $relationship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $relationship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $relationship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
