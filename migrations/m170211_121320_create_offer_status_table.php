<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offer_status`.
 */
class m170211_121320_create_offer_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('offer_status', [
            'id' => $this->primaryKey(),
            'class' => $this->string(20),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('offer_status_lang', [
            'offer_status_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('offer_status_id-lang_id', 'offer_status_lang', ['offer_status_id', 'lang_id']);

        $this->addForeignKey('fk-offer_status_lang-offer_status_id', 'offer_status_lang', 'offer_status_id', 'offer_status', 'id', 'CASCADE');

        $this->addForeignKey('fk-offer_status_lang-lang_id', 'offer_status_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'class' => 'success',
                'en' => 'Active',
                'ru' => 'Активно',
            ],
            [
                'class' => 'default',
                'en' => 'Not active',
                'ru' => 'Не активно',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('offer_status', ['class' => $item['class']]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('offer_status', ['position' => $id], ['id' => $id]);
            $this->batchInsert('offer_status_lang', ['offer_status_id', 'lang_id', 'name'], [
                [$id, 'en', $item['en']],
                [$id, 'ru', $item['ru']],
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-offer_status_lang-lang_id', 'offer_status_lang');

        $this->dropForeignKey('fk-offer_status_lang-offer_status_id', 'offer_status_lang');

        $this->dropTable('offer_status_lang');
        
        $this->dropTable('offer_status');
    }
}
