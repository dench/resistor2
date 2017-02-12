<?php

use yii\db\Migration;

class m161205_085955_insert_row_to_page_table extends Migration
{
    public function safeUp()
    {
        $this->insert('page', [
            'slug' => 'contacts',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $id = Yii::$app->db->getLastInsertID();

        $this->batchInsert('page_lang', ['page_id', 'lang_id', 'name', 'title'], [
            [$id, 'en', 'Contacts', 'Contact us'],
            [$id, 'ru', 'Контакты', 'Свяжитесь с нами'],
        ]);
    }

    public function safeDown()
    {
        $this->delete('page', ['slug' => 'contacts']);
    }
}
