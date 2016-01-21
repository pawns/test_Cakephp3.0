

<?= $this->element('side_menu') ?>
<div class="articles form large-9 medium-8 columns content">

	 <form method="post" id="importExcel_form" enctype="multipart/form-data" action="inputExcel">
	<input type="file" name="excel" id="excel"  />
	<input type='submit' value='导入'>
	</form>	

     <?= $this->Form->create($article, [
        'type'=> 'post', // file || get 
     // 'url' => ['controller' => 'Posts', 'action' => 'form'], // 'http://www.google.com/search'
      //'context' => ['validator' => ['Users' => 'register','Comments' => 'default']],
    ]);?>
    <fieldset>
        <legend><?= __('Form') ?></legend>

        
        <?php 
         echo $this->Form->input('text', [
            'type' => 'text',
            'required' => false,
            'label' => 'Text',
            'default' => 'default value',
            'error' => false,
            
            'name' => 'data[text]',
            'class' => 'abc',
            'onclick'=>'function()',
            'value' => 'default value',
            //'disabled'=> 'disabled',
        ]); 

        echo $this->Form->input('textarea', [
            'type' => 'textarea',
            'rows' => '5',
            'cols' => '5',
            'escape' => false,

        ]); 

        echo $this->Form->input('password', [
            'type' => 'password',
        ]); 

        echo $this->Form->input('checkbox', [
            'type' => 'checkbox',
            'value' => 'Y',
            'hiddenField' => 'N',
            'checked' => 'checked',
            //'hiddenField' => false,
        ]); 

        echo $this->Form->input('radiobutton', [
            'type' => 'radio',
            'options' => ['s'=>'small', 'm'=>'medium', 'l'=>'large'],
            'default' => 's',
        ]); 

        echo $this->Form->input('datetime', [
            'type' => 'datetime',
            'monthNames' => ['1'=>'01','2'=>'02'],//12
            'timeFormat' => 24, //12
            'minYear' => 2014, 
            'maxYear' => 2019, 
            'second' => true, 
            'interval' => 15, 
        ]); 

        
        echo $this->Form->input('year', [
            'type' => 'year',
            'minYear' => 2000,
            'maxYear' => date('Y'),
            'orderYear' => 'asc',
        ]); 

        echo $this->Form->input('select', [
            //'options' => ['s'=>'small', 'm'=>'medium', 'l'=>'large'],
            /*
            'options' => [
                'Group 1' => [
                    'Value 1' => 'Label 1',
                    'Value 2' => 'Label 2'
                ],
                'Group 2' => [
                    'Value 3' => 'Label 3'
                ]
            ],*/
            'options' => [
                [ 'text' => 'Description 1', 'value' => 'value 1', 'attr_name' => 'attr_value 1' ],
                [ 'text' => 'Description 2', 'value' => 'value 2', 'attr_name' => 'attr_value 2' ],
                [ 'text' => 'Description 3', 'value' => 'value 3', 'other_attr_name' => 'other_attr_value' ],
            ],
        'multiple' => false,
        //'multiple' => 'checkbox',
        //'disabled' => ['s'],

        ]); 

        ?>

    </fieldset>
    
    <?php
        echo $this->Form->button('Button提交', ['type' => 'button']); 
        echo $this->Form->button('重置', ['type' => 'reset']); 
        echo $this->Form->button('提交表单', ['type' => 'submit']); 
    ?>


    <?= $this->Form->end() ?>
</div>

<div>
		
</div>
