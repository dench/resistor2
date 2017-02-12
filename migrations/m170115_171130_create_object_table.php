<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object`.
 */
class m170115_171130_create_object_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'type_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'location_id' => $this->integer()->notNull(),
            'parking_id' => $this->integer(),
            'stage_id' => $this->integer(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'coordinates' => $this->string(),
            'address' => $this->string(),
            'year' => $this->integer(),
            'covered' => $this->integer(),
            'uncovered' => $this->integer(),
            'plot' => $this->integer(),
            'bathroom' => $this->integer(),
            'bedroom' => $this->integer(),
            'solarpanel' => $this->boolean(),
            'sauna' => $this->boolean(),
            'furniture' => $this->boolean(),
            'conditioner' => $this->boolean(),
            'heating' => $this->boolean(),
            'pantry' => $this->boolean(),
            'tennis' =>  $this->boolean(),
            'pool' =>  $this->boolean(),
            'note_admin' => $this->text(),
            'code' => $this->string(20)->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('object_lang', [
            'object_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
            'text' => $this->text(),
        ]);

        $this->addPrimaryKey('object_id-lang_id', 'object_lang', ['object_id', 'lang_id']);

        $this->addForeignKey('fk-object_lang-object_id', 'object_lang', 'object_id', 'object', 'id', 'CASCADE');

        $this->addForeignKey('fk-object_lang-lang_id', 'object_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk-object-user_id', 'object', 'user_id', 'user', 'id', 'SET NULL');
        
        $this->addForeignKey('fk-object-type_id', 'object', 'type_id', 'type', 'id');

        $this->addForeignKey('fk-object-region_id', 'object', 'region_id', 'region', 'id');

        $this->addForeignKey('fk-object-location_id', 'object', 'location_id', 'location', 'id');

        $this->addForeignKey('fk-object-stage_id', 'object', 'stage_id', 'stage', 'id', 'SET NULL');

        $this->addForeignKey('fk-object-parking_id', 'object', 'parking_id', 'parking', 'id', 'SET NULL');

        $this->addForeignKey('fk-object-status_id', 'object', 'status_id', 'object_status', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object-status_id', 'object');

        $this->dropForeignKey('fk-object-parking_id', 'object');

        $this->dropForeignKey('fk-object-stage_id', 'object');
        
        $this->dropForeignKey('fk-object-location_id', 'object');

        $this->dropForeignKey('fk-object-region_id', 'object');

        $this->dropForeignKey('fk-object-type_id', 'object');

        $this->dropForeignKey('fk-object-user_id', 'object');

        $this->dropForeignKey('fk-object_lang-lang_id', 'object_lang');
        
        $this->dropForeignKey('fk-object_lang-object_id', 'object_lang');
        
        $this->dropTable('object_lang');

        $this->dropTable('object');
    }
}
