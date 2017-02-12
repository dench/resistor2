<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property_view`.
 */
class m170204_182856_create_property_view_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property_view', [
            'property_id' => $this->integer()->notNull(),
            'view_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-property_view', 'property_view', ['property_id', 'view_id']);

        $this->addForeignKey('fk-property_view-property_id', 'property_view', 'property_id', 'property', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_view-view_id', 'property_view', 'view_id', 'view', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-property_view-view_id', 'property_view');

        $this->dropForeignKey('fk-property_view-property_id', 'property_view');

        $this->dropTable('property_view');
    }
}
