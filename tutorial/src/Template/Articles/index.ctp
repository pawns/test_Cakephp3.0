<?= $this->element('side_menu') ?>
<div class="articles index large-9 medium-8 columns content">

    <h3><?= __('Articles') ?></h3>

     <?= $this->Form->create($query,[
            'url' => ['controller' => 'Articles', 'action' => 'index'], 
            'type' => 'get'    
    ]) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>created</th>
                <th>modified</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td><?= $this->Form->input('id',['type'=>'text']) ?></td>
                <td><?= $this->Form->input('title') ?></td>
                <td>
                    <?= $this->Form->input('created_start', ['type' => 'text']); ?>
                    <?= $this->Form->input('created_end', ['type' => 'text']); ?>

                </td>
                <td></td>
                <td class="actions">
                    <?= $this->Form->button(__('Submit')) ?>
                </td>
            </tr>
            
        </tbody>
    </table>
    <?= $this->Form->end() ?>

    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td><?= h($article->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">

        <ul class="pagination">
            <?php

                $this->Paginator->options([
                    'url' => $this->request->query,
                    /*
                    [
                        'sort' => 'email',
                        'direction' => 'desc',
                        'page' => 6,
                        'lang' => 'en'
                    ]
                    */
                ]);
            ?>
            <?= $this->Paginator->prev('< ' . __('上一页')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('下一页') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter([
            'format' => 'Page {{page}} of {{pages}}, showing {{current}} records out of
             {{count}} total, starting on record {{start}}, ending on {{end}}'
        ]) ?></p>
    </div>
</div>
