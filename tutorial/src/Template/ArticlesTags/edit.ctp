<?= $this->element('side_menu') ?>
<div class="articlesTags form large-9 medium-8 columns content">
    <?= $this->Form->create($articlesTag) ?>
    <fieldset>
        <legend><?= __('Edit Articles Tag') ?></legend>
        <?php
            echo $this->Form->input('article_id', ['options' => $articles, 'empty' => true]);
            echo $this->Form->input('tag_id', ['options' => $tags, 'empty' => true]);
            echo $this->Form->input('starred');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
