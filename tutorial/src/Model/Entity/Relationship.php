<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Relationship Entity.
 *
 * @property int $id
 * @property int $follower_id
 * @property \App\Model\Entity\Follower $follower
 * @property int $followed_id
 * @property \App\Model\Entity\Followed $followed
 * @property int $count
 */
class Relationship extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
