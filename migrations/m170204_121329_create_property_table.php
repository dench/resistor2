<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property`.
 */
class m170204_121329_create_property_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'object_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'location_id' => $this->integer()->notNull(),
            'parking_id' => $this->integer(),
            'stage_id' => $this->integer(),
            'sold_id' => $this->integer()->notNull()->defaultValue(1),
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
            'price' => $this->integer(),
            'vat' => $this->boolean(),
            'commission' => $this->integer(),
            'titul' => $this->boolean(),
            'note_agent' => $this->text(),
            'note_admin' => $this->text(),
            'contacts' => $this->text(),
            'contacts_owner' => $this->text(),
            'top' => $this->boolean()->notNull()->defaultValue(false),
            'code' => $this->string(20)->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('property_lang', [
            'property_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
            'text' => $this->text(),
        ]);

        $this->addPrimaryKey('property_id-lang_id', 'property_lang', ['property_id', 'lang_id']);

        $this->addForeignKey('fk-property_lang-property_id', 'property_lang', 'property_id', 'property', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_lang-lang_id', 'property_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk-property-user_id', 'property', 'user_id', 'user', 'id', 'SET NULL');

        $this->addForeignKey('fk-property-object_id', 'property', 'object_id', 'object', 'id', 'CASCADE');

        $this->addForeignKey('fk-property-type_id', 'property', 'type_id', 'type', 'id');

        $this->addForeignKey('fk-property-region_id', 'property', 'region_id', 'region', 'id');

        $this->addForeignKey('fk-property-location_id', 'property', 'location_id', 'location', 'id');

        $this->addForeignKey('fk-property-stage_id', 'property', 'stage_id', 'stage', 'id', 'SET NULL');

        $this->addForeignKey('fk-property-parking_id', 'property', 'parking_id', 'parking', 'id', 'SET NULL');

        $this->addForeignKey('fk-property-status_id', 'property', 'status_id', 'property_status', 'id');

        $this->addForeignKey('fk-property-sold_id', 'property', 'sold_id', 'property_sold', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-property-sold_id', 'property');
        
        $this->dropForeignKey('fk-property-status_id', 'property');

        $this->dropForeignKey('fk-property-stage_id', 'property');
        
        $this->dropForeignKey('fk-property-parking_id', 'property');
        
        $this->dropForeignKey('fk-property-location_id', 'property');

        $this->dropForeignKey('fk-property-region_id', 'property');

        $this->dropForeignKey('fk-property-type_id', 'property');
        
        $this->dropForeignKey('fk-property-object_id', 'property');

        $this->dropForeignKey('fk-property-user_id', 'property');
        
        $this->dropForeignKey('fk-property_lang-lang_id', 'property_lang');

        $this->dropForeignKey('fk-property_lang-property_id', 'property_lang');

        $this->dropTable('property_lang');

        $this->dropTable('property');
    }
}
