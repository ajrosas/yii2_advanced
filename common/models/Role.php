<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $backend_module_access
 * @property string|null $frontend_module_access
 * @property string|null $role_access
 * @property string|null $backend_navigations
 * @property string|null $frontend_navigations
 * @property int|null $level
 * @property int $record_status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['backend_module_access', 'frontend_module_access', 'role_access', 'backend_navigations', 'frontend_navigations'], 'string'],
            [['level', 'record_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['level'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'backend_module_access' => 'Backend Module Access',
            'frontend_module_access' => 'Frontend Module Access',
            'role_access' => 'Role Access',
            'backend_navigations' => 'Backend Navigations',
            'frontend_navigations' => 'Frontend Navigations',
            'level' => 'Level',
            'record_status' => 'Record Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getDetailColumns($params = [])
    {
        $detailColumns = [
            'id:raw',
            'name:raw',
            'backend_module_access:raw',
            'frontend_module_access:raw',
            'role_access:raw',
            'backend_navigations',
            'frontend_navigations',
            'level:raw',
            'record_status:raw',
            'created_at:raw',
            'updated_at:raw',
        ];

        return $detailColumns;
    }
}
