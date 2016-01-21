<?= $this->element('side_menu') ?>

<div class="authors form large-9 medium-8 columns content">
    <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $author->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]
            )
    ?>


    <?= $this->Form->create($author) ?>
    <fieldset>
        <legend><?= __('Edit Author') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('articles._ids', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
