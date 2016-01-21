<?= $this->element('side_menu') ?>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('body');
            echo $this->Form->input('tags._ids', ['options' => $tags]);
            echo $this->Form->input('authors._ids', ['options' => $authors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $article->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
    )
    ?>
    <?= $this->Form->end() ?>
</div>
