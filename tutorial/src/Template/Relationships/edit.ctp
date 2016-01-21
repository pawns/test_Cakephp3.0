<?= $this->element('side_menu') ?>

<div class="relationships form large-9 medium-8 columns content">
    <ul>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relationship->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relationship->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Relationships'), ['action' => 'index']) ?></li>
    </ul>

    <?= $this->Form->create($relationship) ?>
    <fieldset>
        <legend><?= __('Edit Relationship') ?></legend>
        <?php
            echo $this->Form->input('follower_id');
            echo $this->Form->input('followed_id');
            echo $this->Form->input('count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
