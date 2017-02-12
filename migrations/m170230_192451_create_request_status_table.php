<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_status`.
 */
class m170230_192451_create_request_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request_status', [
            'id' => $this->primaryKey(),
            'class' => $this->string(20),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('request_status_lang', [
            'request_status_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('request_status_id-lang_id', 'request_status_lang', ['request_status_id', 'lang_id']);

        $this->addForeignKey('fk-request_status_lang-request_status_id', 'request_status_lang', 'request_status_id', 'request_status', 'id', 'CASCADE');

        $this->addForeignKey('fk-request_status_lang-lang_id', 'request_status_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'class' => 'success',
                'en' => 'New',
                'ru' => 'Новое',
            ],
            [
                'class' => 'default',
                'en' => 'Viewed',
                'ru' => 'Просмотрено',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('request_status', ['class' => $item['class']]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('request_status', ['position' => $id]);
            $this->batchInsert('request_status_lang', ['request_status_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-request_status_lang-lang_id', 'request_status_lang');

        $this->dropForeignKey('fk-request_status_lang-request_status_id', 'request_status_lang');

        $this->dropTable('request_status_lang');
        
        $this->dropTable('request_status');
    }
}
