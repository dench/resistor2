<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offer`.
 */
class m170211_174038_create_offer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('offer', [
            'id' => $this->primaryKey(),
            'code' => $this->string(32)->unique()->notNull(),
            'text' => $this->text(),
            'name' => $this->string(),
            'phone1' => $this->string(),
            'phone2' => $this->string(),
            'email' => $this->string(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-offer-status_id', 'offer', 'status_id', 'offer_status', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-offer-status_id', 'offer');

        $this->dropTable('offer');
    }
}
