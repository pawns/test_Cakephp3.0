<?= $this->element('side_menu') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  
</nav>
<div class="profiles form large-9 medium-8 columns content">
      <ul>
        
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $profile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
            )
        ?></li>
        
    </ul>


    <?= $this->Form->create($profile) ?>
    <fieldset>
        <legend><?= __('Edit Profile') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('author_id', ['options' => $authors, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
