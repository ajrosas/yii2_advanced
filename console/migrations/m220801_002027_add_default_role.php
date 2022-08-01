<?php

use yii\db\Migration;

/**
 * Class m220801_002027_add_default_role
 */
class m220801_002027_add_default_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'backend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@backend')),
                'frontend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@frontend')),
                'role_access' => json_encode([]),
                'backend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@backend')),
                'frontend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@frontend')),
                'level' => 1,
            ],
            [
                'name' => 'Admin',
                'backend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@backend')),
                'frontend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@frontend')),
                'role_access' => json_encode([]),
                'backend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@backend')),
                'frontend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@frontend')),
                'level' => 2,
            ],
            [
                'name' => 'User',
                'backend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@backend')),
                'frontend_module_access' => json_encode(Yii::$app->AccessControl->controller_actions('@frontend')),
                'role_access' => json_encode([]),
                'backend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@backend')),
                'frontend_navigations' => json_encode(Yii::$app->Navigation->GetAllNavigations([], [], true, '@frontend')),
                'level' => 3,
            ],
        ];

        
        foreach ($roles as $key => $role) {
            $this->insert('{{%role}}', [
                'name' => $role['name'],
                'backend_module_access' => $role['backend_module_access'],
                'frontend_module_access' => $role['frontend_module_access'],
                'role_access' => $role['role_access'],
                'backend_navigations' => $role['backend_navigations'],
                'backend_navigations' => $role['backend_navigations'],
                'frontend_navigations' => $role['frontend_navigations'],
                'level' => $role['level'],
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
        echo "m220801_002027_add_default_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220801_002027_add_default_role cannot be reverted.\n";

        return false;
    }
    */
}
