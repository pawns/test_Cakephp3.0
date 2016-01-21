<?= $this->element('side_menu') ?>


<div class="articles view large-9 medium-8 columns content">






    <h2><?= "---Find find('all')---" ?></h2>
    <?php foreach ($all_articles as $article): ?>


    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($article->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>

        <?php if (!empty($article->comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Article Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->comments as $comments): ?>
            <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= h($comments->body) ?></td>
                <td><?= h($comments->article_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($article->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->tags as $tags): ?>
            <tr>
                <td><?= h($tags->id) ?></td>
                <td><?= h($tags->name) ?></td>
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
        <h4><?= __('Related Authors') ?></h4>
        <?php if (!empty($article->authors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->authors as $authors): ?>
            <tr>
                <td><?= h($authors->id) ?></td>
                <td><?= h($authors->first_name) ?></td>
                <td><?= h($authors->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Authors', 'action' => 'view', $authors->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Authors', 'action' => 'edit', $authors->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Authors', 'action' => 'delete', $authors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authors->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <?php endforeach; ?>




    <h2><?= '---Find first()---' ?></h2>
    <h3><?= h($first_articles->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($first_articles->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($first_articles->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($first_articles->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($first_articles->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($first_articles->body)); ?>
    </div>


    <h2><?= '---Find last()---' ?></h2>
    <h3><?= h($last_articles->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($last_articles->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($last_articles->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($last_articles->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($last_articles->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($last_articles->body)); ?>
    </div>

    <h2><?= '---Find count()---' ?></h2>
    <h3><?= h($count_articles) ?></h3>
    
    <h2><?= '---Find isEmpty()---' ?></h2>
    <h3><?= h($is_empty_articles) ?></h3>
    


    <h2><?= "---Find find('list')---" ?></h2>
    <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('title') ?></th>
                <th><?= __('Body') ?></th>
            </tr>
            <?php foreach ( $list_articles->toArray() as $key=>$value): ?>
            <tr>
                <td><?= h($key) ?></td>
                <td><?= h($value) ?></td>
            </tr>
            <?php endforeach; ?>
    </table>
   

    

</div>
