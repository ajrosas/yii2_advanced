<?php

use yii\db\Migration;

/**
 * Class m220725_021242_add_default_user_table
 */
class m220725_021242_add_default_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $password = '123456';
        
        $users = [
            [
                'username' => 'super-admin',
                'role_id' => 1,
                'password_hash' => Yii::$app->security->generatePasswordHash($password), //123456
                'email' => 'starter.superadmin@gmail.com',
            ],
            [
                'username' => 'admin',
                'role_id' => 2,
                'password_hash' => Yii::$app->security->generatePasswordHash($password), //123456
                'email' => 'starter.admin@gmail.com',
            ],
        ];

        
        foreach ($users as $key => $user) {
            $this->insert('{{%user}}', [
                'username' => $user['username'],
                'role_id' => $user['role_id'],
                'password_hash' => $user['password_hash'],
                'auth_key' => Yii::$app->security->generateRandomString(),
                'email' => $user['email'],
                'created_at' => new \yii\db\Expression('UTC_TIMESTAMP'),
                'updated_at' => new \yii\db\Expression('UTC_TIMESTAMP'),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220725_021242_add_default_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220725_021242_add_default_user_table cannot be reverted.\n";

        return false;
    }
    */
}
