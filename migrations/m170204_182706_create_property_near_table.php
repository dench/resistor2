<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property_near`.
 */
class m170204_182706_create_property_near_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property_near', [
            'property_id' => $this->integer()->notNull(),
            'near_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-property_near', 'property_near', ['property_id', 'near_id']);

        $this->addForeignKey('fk-property_near-property_id', 'property_near', 'property_id', 'property', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_near-near_id', 'property_near', 'near_id', 'near', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-property_near-near_id', 'property_near');

        $this->dropForeignKey('fk-property_near-property_id', 'property_near');

        $this->dropTable('property_near');
    }
}
