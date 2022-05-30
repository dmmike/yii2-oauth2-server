<?php
// This class was automatically generated by a giiant build task.
// You should not change it manually as it will be overwritten on next build.

namespace rhertogh\Yii2Oauth2Server\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth2_client_scope".
 *
 * @property integer $client_id
 * @property integer $scope_id
 * @property integer $applied_by_default
 * @property integer $required_on_authorization
 * @property integer $enabled
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2Client $client
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2Scope $scope
 * @property string $aliasModel
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Oauth2ClientScope extends \rhertogh\Yii2Oauth2Server\models\base\Oauth2BaseActiveRecord
{




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'scope_id', 'created_at', 'updated_at'], 'required'],
            [['client_id', 'scope_id', 'applied_by_default', 'required_on_authorization', 'enabled', 'created_at', 'updated_at'], 'integer'],
            [['client_id', 'scope_id'], 'unique', 'targetAttribute' => ['client_id', 'scope_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => Yii::t('oauth2', 'Client ID'),
            'scope_id' => Yii::t('oauth2', 'Scope ID'),
            'applied_by_default' => Yii::t('oauth2', 'Applied By Default'),
            'required_on_authorization' => Yii::t('oauth2', 'Required On Authorization'),
            'enabled' => Yii::t('oauth2', 'Enabled'),
            'created_at' => Yii::t('oauth2', 'Created At'),
            'updated_at' => Yii::t('oauth2', 'Updated At'),
        ];
    }
    
    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientQueryInterface|\yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\rhertogh\Yii2Oauth2Server\models\Oauth2Client::className(), ['id' => 'client_id'])->inverseOf('clientScopes');
    }
    
    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ScopeQueryInterface|\yii\db\ActiveQuery
     */
    public function getScope()
    {
        return $this->hasOne(\rhertogh\Yii2Oauth2Server\models\Oauth2Scope::className(), ['id' => 'scope_id'])->inverseOf('clientScopes');
    }


    
    /**
     * @inheritdoc
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientScopeQueryInterface|\yii\db\ActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return Yii::createObject(\rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientScopeQueryInterface::class, [get_called_class()]);
    }


}
