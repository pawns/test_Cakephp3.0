<?php
namespace App\Model\Table;

use App\Model\Entity\Article;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\BelongsToMany $Tags
 */
class ArticlesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('articles');
        $this->displayField('title');
        $this->primaryKey('id');

       // $this->addBehavior('Timestamp');

        /* one to many */
        $this->hasMany('Comments', [
            'foreignKey' => 'article_id',
            //  'dependent' => false 
        ]);

        /* many to many with through */
        $this->belongsToMany('Tags', [
            'through' => 'ArticlesTags',
        //  'dependent' => false 
        ]);


        /* many to many without through */
        $this->belongsToMany('Authors', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'articles_authors',
//          'dependent' => false 
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('body');

        return $validator;
    }
}
