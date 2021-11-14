<?php

// This class was automatically generated by a giiant build task.
// You should not change it manually as it will be overwritten on next build.

namespace rhertogh\Yii2Oauth2Server\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth2_auth_code_scope".
 *
 * @property string $auth_code_id
 * @property integer $scope_id
 * @property integer $created_at
 *
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode $authCode
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2Scope $scope
 * @property string $aliasModel
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Oauth2AuthCodeScope extends \rhertogh\Yii2Oauth2Server\models\base\Oauth2BaseActiveRecord
{




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_code_id', 'scope_id', 'created_at'], 'required'],
            [['auth_code_id', 'scope_id', 'created_at'], 'integer'],
            [['auth_code_id', 'scope_id'], 'unique', 'targetAttribute' => ['auth_code_id', 'scope_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'auth_code_id' => Yii::t('oauth2', 'Auth Code ID'),
            'scope_id' => Yii::t('oauth2', 'Scope ID'),
            'created_at' => Yii::t('oauth2', 'Created At'),
        ];
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AuthCodeQueryInterface|\yii\db\ActiveQuery
     */
    public function getAuthCode()
    {
        return $this->hasOne(\rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode::className(), ['id' => 'auth_code_id'])->inverseOf('authCodeScopes');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ScopeQueryInterface|\yii\db\ActiveQuery
     */
    public function getScope()
    {
        return $this->hasOne(\rhertogh\Yii2Oauth2Server\models\Oauth2Scope::className(), ['id' => 'scope_id'])->inverseOf('authCodeScopes');
    }



    /**
     * @inheritdoc
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AuthCodeScopeQueryInterface|\yii\db\ActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return Yii::createObject(\rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AuthCodeScopeQueryInterface::class, [get_called_class()]);
    }
}
