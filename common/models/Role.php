<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $module_access
 * @property string|null $role_access
 * @property string|null $navigations
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
            [['module_access', 'role_access', 'navigations'], 'string'],
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
            'module_access' => 'Module Access',
            'role_access' => 'Role Access',
            'navigations' => 'Navigations',
            'level' => 'Level',
            'record_status' => 'Record Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
