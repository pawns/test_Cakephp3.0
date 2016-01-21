<?= $this->element('side_menu') ?>
<div class="relationships form large-9 medium-8 columns content">
    <?= $this->Form->create($relationship) ?>
    <fieldset>
        <legend><?= __('Add Relationship') ?></legend>
        <?php
            echo $this->Form->input('follower_id');
            echo $this->Form->input('followed_id');
            echo $this->Form->input('count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
