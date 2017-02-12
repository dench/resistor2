<?php

use yii\db\Migration;

class m161205_085844_insert_row_to_page_table extends Migration
{
    public function safeUp()
    {
        $this->insert('page', [
            'slug' => 'search',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $id = Yii::$app->db->getLastInsertID();

        $this->batchInsert('page_lang', ['page_id', 'lang_id', 'name', 'title'], [
            [$id, 'en', 'Property search', 'Property search'],
            [$id, 'ru', 'Подбор недвижимости', 'Подбор недвижимости'],
        ]);
    }

    public function safeDown()
    {
        $this->delete('page', ['slug' => 'search']);
    }
}
