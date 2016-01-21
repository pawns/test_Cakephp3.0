<?= $this->element('side_menu') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
   
</nav>
<div class="profiles view large-9 medium-8 columns content">
     <ul>
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
    </ul>


    <h3><?= h($profile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($profile->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Author') ?></th>
            <td><?= $profile->has('author') ? $this->Html->link($profile->author->name, ['controller' => 'Authors', 'action' => 'view', $profile->author->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
    </table>
</div>
