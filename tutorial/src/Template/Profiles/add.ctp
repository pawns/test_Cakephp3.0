<?= $this->element('side_menu') ?>
<div class="profiles form large-9 medium-8 columns content">
    <?= $this->Form->create($profile) ?>
    <fieldset>
        <legend><?= __('Add Profile') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('author_id', ['options' => $authors, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
