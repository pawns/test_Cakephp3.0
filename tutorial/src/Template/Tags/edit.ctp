<?= $this->element('side_menu') ?>

<div class="tags form large-9 medium-8 columns content">
      <ul>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tag->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]
            )
        ?></li>
    </ul>

    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Edit Tag') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('articles._ids', ['options' => $articles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
