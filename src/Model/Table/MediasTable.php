<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medias Model
 *
 * @property \App\Model\Table\TalentsTable&\Cake\ORM\Association\BelongsTo $Talents
 *
 * @method \App\Model\Entity\Media newEmptyEntity()
 * @method \App\Model\Entity\Media newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Media[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Media get($primaryKey, $options = [])
 * @method \App\Model\Entity\Media findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Media patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Media[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Media|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Media saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */

// ======= THIS TABLE IS NOT CURRENTLY BEING USED ======= //
class MediasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('medias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Talents', [
            'foreignKey' => 'talent_id',
            'joinType' => 'INNER',
        ]);
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
            ->scalar('filename')
            ->maxLength('filename', 100)
            ->requirePresence('filename', 'create')
            ->notEmptyFile('filename');

        $validator
            ->scalar('filepath')
            ->maxLength('filepath', 100)
            ->allowEmptyFile('filepath');

        $validator
            ->nonNegativeInteger('talent_id')
            ->requirePresence('talent_id', 'create')
            ->notEmptyString('talent_id');

        $validator
            ->allowEmptyFile('filename')
            ->add('filename', [
                'mimeType'=> [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'The image must be png or jpg',
                ]// .png and jpg file extension only

            ])

            ->add('filename', [
                'fileSize' => [
                    'rule' => ['fileSize', '<', '5MB'],
                    'message' => 'The image must be less than 5MB',
                ]])

            ->add('filename', [
                'fileSize' => [
                    'rule' => ['fileSize', '>', '10KB'],
                    'message' => 'The image must be greater than 10KB',
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
                    'rule' => ['fileSize', '>', '10KB'],
                    'message' => 'The image must be greater than 10KB',
                ]])

            ->add('filename2', [
                'fileSize' => [
                    'rule' => ['fileSize', '<', '5MB'],
                    'message' => 'The image must be less than 5MB',
                ]]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('talent_id', 'Talents'), ['errorField' => 'talent_id']);

        return $rules;
    }
}
