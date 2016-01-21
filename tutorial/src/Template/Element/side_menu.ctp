<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>


        <li><?= $this->Html->link(__('表单 Authors'), ['controller' => 'Articles', 'action' => 'form']) ?></li>
        <li><?= $this->Html->link(__('关联 Articles'), ['controller'=>'Articles','action' => 'associated']) ?></li>
        <li><?= $this->Html->link(__('查找 Articles'), ['controller'=>'Articles','action' => 'find']) ?></li>
        <li><?= $this->Html->link(__('更新 Articles'), ['controller'=>'Articles','action' => 'update']) ?></li>


        <li>------------------------------------------</li>
        <li><?= $this->Html->link(__('文章列表 Articles'), ['controller'=>'Articles','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('评论列表 Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('标签列表 Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('作者列表 Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('新文章 Articles'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('新评论 Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('新标签 Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('新作者 Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
    </ul>
</nav>
