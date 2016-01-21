<?= $this->element('side_menu') ?>
<div class="articlesTags index large-9 medium-8 columns content">
    <h3><?= __('Articles Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('article_id') ?></th>
                <th><?= $this->Paginator->sort('tag_id') ?></th>
                <th><?= $this->Paginator->sort('starred') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesTags as $articlesTag): ?>
            <tr>
                <td><?= $this->Number->format($articlesTag->id) ?></td>
                <td><?= $articlesTag->has('article') ? $this->Html->link($articlesTag->article->title, ['controller' => 'Articles', 'action' => 'view', $articlesTag->article->id]) : '' ?></td>
                <td><?= $articlesTag->has('tag') ? $this->Html->link($articlesTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $articlesTag->tag->id]) : '' ?></td>
                <td><?= $this->Number->format($articlesTag->starred) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTag->id)]) ?>
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
