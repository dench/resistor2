<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parking`.
 */
class m170115_171126_create_parking_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('parking', [
            'id' => $this->primaryKey(),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('parking_lang', [
            'parking_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('parking_id-lang_id', 'parking_lang', ['parking_id', 'lang_id']);

        $this->addForeignKey('fk-parking_lang-parking_id', 'parking_lang', 'parking_id', 'parking', 'id', 'CASCADE');

        $this->addForeignKey('fk-parking_lang-lang_id', 'parking_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'en' => 'Private',
                'ru' => 'Приватный',
            ],
            [
                'en' => 'Communal',
                'ru' => 'Коммунальный',
            ],
            [
                'en' => 'Garage',
                'ru' => 'Гараж',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('parking', []);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('parking', ['position' => $id], ['id' => $id]);
            $this->batchInsert('parking_lang', ['parking_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-parking_lang-lang_id', 'parking_lang');

        $this->dropForeignKey('fk-parking_lang-parking_id', 'parking_lang');

        $this->dropTable('parking_lang');
        
        $this->dropTable('parking');
    }
}
