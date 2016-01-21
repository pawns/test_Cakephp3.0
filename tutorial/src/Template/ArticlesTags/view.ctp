
<?= $this->element('side_menu') ?>
<div class="articlesTags view large-9 medium-8 columns content">
    <?= $this->Html->link(__('Edit Articles Tag'), ['action' => 'edit', $articlesTag->id]) ?> 
    <?= $this->Form->postLink(__('Delete Articles Tag'), ['action' => 'delete', $articlesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTag->id)]) ?> 


    <h3><?= h($articlesTag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Article') ?></th>
            <td><?= $articlesTag->has('article') ? $this->Html->link($articlesTag->article->title, ['controller' => 'Articles', 'action' => 'view', $articlesTag->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= $articlesTag->has('tag') ? $this->Html->link($articlesTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $articlesTag->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesTag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Starred') ?></th>
            <td><?= $this->Number->format($articlesTag->starred) ?></td>
        </tr>
    </table>
</div>
