<?php

use yii\db\Migration;

/**
 * Handles the creation of table `location`.
 */
class m170115_171122_create_location_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('location', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('location_lang', [
            'location_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('location_id-lang_id', 'location_lang', ['location_id', 'lang_id']);

        $this->addForeignKey('fk-location-region_id', 'location', 'region_id', 'region', 'id');

        $this->addForeignKey('fk-location_lang-location_id', 'location_lang', 'location_id', 'location', 'id', 'CASCADE');

        $this->addForeignKey('fk-location_lang-lang_id', 'location_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-location_lang-lang_id', 'location_lang');

        $this->dropForeignKey('fk-location_lang-location_id', 'location_lang');

        $this->dropForeignKey('fk-location-region_id', 'location');

        $this->dropTable('location_lang');

        $this->dropTable('location');
    }
}
