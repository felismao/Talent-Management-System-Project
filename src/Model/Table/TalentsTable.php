<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Validation\Validation;
use function Sodium\add;

/**
 * Talents Model
 * @property \App\Model\Table\MediasTable&\Cake\ORM\Association\HasMany $Medias
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Talent newEmptyEntity()
 * @method \App\Model\Entity\Talent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Talent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Talent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Talent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Talent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Talent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Talent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Talent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TalentsTable extends Table
{
    /**
     * @var \Cake\ORM\Association
     */

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('talents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Medias', ['dependent'=>true,
            'foreignKey' => 'talent_id',
        ]);

       // $this->belongsTo('Categories',['dependent'=>true,
       //     'foreignKey' => 'category_id']);

        $this->belongsTo('Locations',['dependent'=>true,
            'foreignKey' => 'location_id']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 19, 'The name has a max length of 19 characters')
            ->requirePresence('name', 'create')
            ->allowEmptyString('name');


        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 19, 'First name has a max length of 19 characters')
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname', 'First name is required');


        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 19, 'Last name has a max length of 19 characters')
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname', 'Last name is required');

        $validator
            ->scalar('email')
            ->maxLength('email', 50, 'Email has a max length of 50 characters')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'Email is required');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 50)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->integer('minagerange')
            ->allowEmptyString('minagerange')
            ->greaterThan('minagerange', 17, 'The minimum age is 18')
            ->add('minagerange', 'length', ['rule' => ['lengthBetween', 0, 2],
                'message' => 'Age cannot be greater than 99',]);



        $validator
            ->integer('maxagerange')
            ->allowEmptyString('maxagerange')
            ->greaterThan('maxagerange', 17, 'The minimum age is 18')
            ->add('maxagerange', 'length', ['rule' => ['lengthBetween', 0, 2],
                'message' => 'Age cannot be greater than 99',]);

        $validator
            ->integer('height')
            ->notEmptyString('height')
            ->add('height', 'length', ['rule' => ['lengthBetween', 0, 3],
                'message' => 'Height must have maximum 3 characters',])
            ->nonNegativeInteger('height');

        $validator
            ->notEmptyString('availability');
        $validator
            ->integer('mobile')
            ->add('mobile', 'length', ['rule' => ['lengthBetween', 0, 13],
                'message' => 'Invalid mobile length',]);

        $validator
            ->notEmptyString('experience');

        $validator
            ->notEmptyString('car');

        $validator
            ->notEmptyString('licence');

        $validator
            ->notEmptyString('dress');
        $validator
            ->notEmptyString('agerangeone');

        $validator
            ->scalar('location_id')
           // ->maxLength('location_id', 50, 'Location cannot be longer than 50 characters')
           ->notEmptyString('location_id');

        $validator
            ->scalar('bio')
            ->maxLength('bio', 5000, 'The biography cannot be larger than 5000 characters (Approximately between 714-1250 words)')
            ->allowEmptyString('bio');

    /*    $validator
            ->add('category', 'custom', [
                'rule' => function($value) {
                    return (bool)count($value['category']) === 3;
                },
                'message' => 'Please select 3.'
            ]);*/

        $validator
            ->add('mobile', [
                'test'=>[
                    'rule' => 'numeric',
                    'allowEmpty' => true, //validate only if not empty
                    'message'=>'Phone number should be numeric',
                ]])
            ->notEmptyString('mobile');


        //$validator
        //    ->scalar('category_id')
        //    ->notEmptyString('category_id');
        //required|image|image_size:>=100,200-300

        $validator
            ->allowEmptyFile('filename1')
            ->add('filename1', [
                'mimeType'=> [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'The image must be png or jpg',
                ]// .png and jpg file extension only

            ])

            ->add('filename1', [
                'fileSize' => [
                    'rule' => ['fileSize', '<', '100MB'],
                    'message' => 'The image must be less than 100MB',
                ]])

            ->add('filename1', [
                'fileSize' => [
                    'rule' => ['fileSize', '>', '1KB'],
                    'message' => 'The image must be greater than 1KB',
                ]]);

        $validator
            ->allowEmptyFile('filename2')

            ->add('filename2', [
                'mimeType'=> [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'The image must be png or jpg',
                ]// .png and jpg file extension only

            ])

            ->add('filename2', [
                'fileSize' => [
                    'rule' => ['fileSize', '>', '1KB'],
                    'message' => 'The image must be greater than 1KB',
                ]])

            ->add('filename2', [
                'fileSize' => [
                    'rule' => ['fileSize', '<', '100MB'],
                    'message' => 'The image must be less than 100MB',
                ]]);

        $validator
            ->allowEmptyFile('change_image')
            ->add('change_image', [
                'mimeType'=> [
                'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'The image must be png or jpg',
                    ]// .png and jpg file extension only

            ])

        ->add('change_image', [
        'fileSize' => [
            'rule' => ['fileSize', '<', '100MB'],
            'message' => 'The image must be less than 100MB',
        ]])

            ->add('change_image', [
                'fileSize' => [
                    'rule' => ['fileSize', '>', '1KB'],
                    'message' => 'The image must be greater than 1KB',
                ]]);

        $validator
            ->notEmptyFile('add_photo')

            ->add('add_photo', [
                'mimeType'=> [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'The image must be png or jpg',
                ]// .png and jpg file extension only

            ])

            ->add('add_photo', [
                'fileSize' => [
                    'rule' => ['fileSize', '>', '1KB'],
                'message' => 'The image must be greater than 1KB',
            ]])

            ->add('add_photo', [
                'fileSize' => [
                    'rule' => ['fileSize', '<', '100MB'],
                    'message' => 'The image must be less than 100MB',
                ]]);

        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules
            ->add($rules->existsIn('location_id', 'Locations'), ['errorField' => 'location_id']);
        //->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id'])

        return $rules;
    }
}
