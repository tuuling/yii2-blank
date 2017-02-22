<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;

class m170217_221351_base_user extends Migration
{
	public function safeUp()
    {
	    $this->db->createCommand(<<<SQL
CREATE TABLE "user" (
  id            SERIAL       NOT NULL,
  username      VARCHAR(255) NOT NULL,
  password      VARCHAR(60)  NOT NULL,
  authkey       VARCHAR(32)  NOT NULL,
  PRIMARY KEY (id)
)
SQL
)->execute();
    }

    public function safeDown()
    {
	    $this->dropTable('user');
    }
}
