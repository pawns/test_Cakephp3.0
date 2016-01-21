<?= $this->Paginator->prev('< ' . __('上一页')) ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(__('下一页') . ' >') ?>
<?= $this->Paginator->counter(
     'Page {{page}} of {{pages}}, showing {{current}} records out of
     {{count}} total, starting on record {{start}}, ending on {{end}}'
) ?>
