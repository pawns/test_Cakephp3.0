<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{

    /*
    *   BasicAuthenticate - http://book.cakephp.org/3.0/en/controllers/components/authentication.html#using-basic-authentication
    */

    /*
    function beforeSave(Event $event)
    {
        $entity = $event->data['entity'];

        if ($entity->isNew()) {
            $hasher = new DefaultPasswordHasher();

            // Generate an API 'token'
            $entity->api_key_plain = sha1(Text::uuid());

            // Bcrypt the token so BasicAuthenticate can check
            // it during login.
            $entity->api_key = $hasher->hash($entity->api_key_plain);
        }
        return true;
    }
   */ 


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');


        $this->belongsToMany('Followeds', [
            'className' => 'Users',
            'foreignKey' => 'follower_id',
            'targetForeignKey' => 'followed_id',
            'joinTable' => 'relationships',
            'through' => 'Relationships'
//            'dependent' => false 
        ]);

        $this->belongsToMany('Followers', [
            'className' => 'Users',
            'foreignKey' => 'followed_id',
            'targetForeignKey' => 'follower_id',
            'joinTable' => 'relationships',
            'through' => 'Relationships'
//            'dependent' => false 
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('username');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('api_key');

        $validator
            ->allowEmpty('api_key_plain');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
