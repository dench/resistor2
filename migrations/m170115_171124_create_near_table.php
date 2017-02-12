<?php

use yii\db\Migration;

/**
 * Handles the creation of table `near`.
 */
class m170115_171124_create_near_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('near', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('near_lang', [
            'near_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('near_id-lang_id', 'near_lang', ['near_id', 'lang_id']);

        $this->addForeignKey('fk-near_lang-near_id', 'near_lang', 'near_id', 'near', 'id', 'CASCADE');

        $this->addForeignKey('fk-near_lang-lang_id', 'near_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Bus stops',
                'ru' => 'Автобусные остановки',
            ],
            [
                'en' => 'Shops',
                'ru' => 'Магазины',
            ],
            [
                'en' => 'Restaurants',
                'ru' => 'Рестораны',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('near', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('near', ['position' => $id], ['id' => $id]);
            $this->batchInsert('near_lang', ['near_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-near_lang-lang_id', 'near_lang');

        $this->dropForeignKey('fk-near_lang-near_id', 'near_lang');

        $this->dropTable('near_lang');

        $this->dropTable('near');
    }
}
