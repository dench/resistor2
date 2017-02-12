<?php

use yii\db\Migration;

/**
 * Handles the creation of table `property_sold`.
 */
class m170204_121321_create_property_sold_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('property_sold', [
            'id' => $this->primaryKey(),
            'class' => $this->string(20),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createTable('property_sold_lang', [
            'property_sold_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('property_sold_id-lang_id', 'property_sold_lang', ['property_sold_id', 'lang_id']);

        $this->addForeignKey('fk-property_sold_lang-property_sold_id', 'property_sold_lang', 'property_sold_id', 'property_sold', 'id', 'CASCADE');

        $this->addForeignKey('fk-property_sold_lang-lang_id', 'property_sold_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $items = [
            [
                'class' => 'success',
                'en' => 'Actual',
                'ru' => 'Актуально',
            ],
            [
                'class' => 'default',
                'en' => 'Sold us',
                'ru' => 'Продано нами',
            ],
            [
                'class' => 'default',
                'en' => 'Sold other',
                'ru' => 'Продано другими',
            ],
        ];

        foreach ($items as $item) {
            $this->insert('property_sold', ['class' => $item['class']]);
            $id = Yii::$app->db->getLastInsertID();
            $this->update('property_sold', ['position' => $id], ['id' => $id]);
            $this->batchInsert('property_sold_lang', ['property_sold_id', 'lang_id', 'name'], [
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
        $this->dropForeignKey('fk-property_sold_lang-lang_id', 'property_sold_lang');

        $this->dropForeignKey('fk-property_sold_lang-property_sold_id', 'property_sold_lang');

        $this->dropTable('property_sold_lang');
        
        $this->dropTable('property_sold');
    }
}
