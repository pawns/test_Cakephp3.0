<?= $this->element('side_menu') ?>

<div class="comments form large-9 medium-8 columns content">
    <ul>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]
            )
        ?></li>
    </ul>

    <?= $this->Form->create($comment) ?>
    <fieldset>
        <legend><?= __('Edit Comment') ?></legend>
        <?php
            echo $this->Form->input('body');
            echo $this->Form->input('article_id', ['options' => $articles, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
