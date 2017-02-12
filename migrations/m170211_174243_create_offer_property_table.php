<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offer_property`.
 */
class m170211_174243_create_offer_property_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('offer_property', [
            'offer_id' => $this->integer()->notNull(),
            'property_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-offer_property', 'offer_property', ['offer_id', 'property_id']);

        $this->addForeignKey('fk-offer_property-offer_id', 'offer_property', 'offer_id', 'offer', 'id', 'CASCADE');

        $this->addForeignKey('fk-offer_property-property_id', 'offer_property', 'property_id', 'property', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-offer_property-property_id', 'offer_property');

        $this->dropForeignKey('fk-offer_property-offer_id', 'offer_property');

        $this->dropTable('offer_property');
    }
}
