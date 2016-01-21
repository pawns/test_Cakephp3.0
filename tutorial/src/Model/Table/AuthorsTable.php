<?php
namespace App\Model\Table;

use App\Model\Entity\Author;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authors Model
 *
 * @property \Cake\ORM\Association\HasMany $Profiles
 * @property \Cake\ORM\Association\BelongsToMany $Articles
 */
class AuthorsTable extends Table
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

        $this->table('authors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasOne('Profiles', [
            'foreignKey' => 'author_id',
            //  'dependent' => false 
        ]);

        /* many to many author*/
        $this->belongsToMany('Articles', [
            'foreignKey' => 'author_id',
            'targetForeignKey' => 'article_id',
            'joinTable' => 'articles_authors',
            //  'dependent' => false 
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


        return $validator;
    }
}
