<?= $this->element('side_menu') ?>

<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article, [
         'type'=> 'post', // file || get 
    ]) ?>
    <fieldset>
        <legend><?= __('Form') ?></legend>
        <?php
                // Article inputs.
        echo $this->Form->input('title',['default'=>'new article title']);
        echo $this->Form->input('body',['default'=>'new article body']);

        // Author inputs (belongsTo)
        //echo $this->Form->input('author.id',['default'=>'foo']);
        echo $this->Form->input('authors.0.first_name',['default'=>'kate first name']);
        echo $this->Form->input('authors.0.last_name',['default'=>'kate last name']);

        // Author profile (belongsTo + hasOne)
        //echo $this->Form->input('author.profile.id');
        echo $this->Form->input('authors.0.profile.username',['default'=>'kate last first name']);

        
        // Tags inputs (belongsToMany)
        //echo $this->Form->input('tags.0.id',['default'=>'kate last first name']);
        echo $this->Form->input('tags.0.name',['default'=>'new tag 1']);
        //echo $this->Form->input('tags.1.id',['default'=>'kate last first name']);
        echo $this->Form->input('tags.1.name',['default'=>'new tag 2']);

        // Inputs for the joint table (articles_tags)
        echo $this->Form->input('tags.0._joinData.starred',['default'=>'1']);
        echo $this->Form->input('tags.1._joinData.starred',['default'=>'0']);

        // Comments inputs (hasMany)
        //echo $this->Form->input('comments.0.id');
        echo $this->Form->input('comments.0.body',['default'=>'new comment body 1']);
        //echo $this->Form->input('comments.1.id');
        echo $this->Form->input('comments.1.body',['default'=>'new comment body 1']);
        

         // Multiple select element for belongsToMany
        /*
        echo $this->Form->input('tags._ids', [
            'type' => 'select',
            'multiple' => true,
            'options' => ['1'=>'first','2'=>'second'],
        ]);
        */

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
