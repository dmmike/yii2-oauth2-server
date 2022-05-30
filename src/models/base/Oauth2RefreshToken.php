<?php
// This class was automatically generated by a giiant build task.
// You should not change it manually as it will be overwritten on next build.

namespace rhertogh\Yii2Oauth2Server\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth2_refresh_token".
 *
 * @property string $id
 * @property string $access_token_id
 * @property string $identifier
 * @property string $expiry_date_time
 * @property integer $enabled
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken $accessToken
 * @property string $aliasModel
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Oauth2RefreshToken extends \rhertogh\Yii2Oauth2Server\models\base\Oauth2BaseActiveRecord
{




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['access_token_id', 'enabled', 'created_at', 'updated_at'], 'integer'],
            [['identifier', 'expiry_date_time', 'created_at', 'updated_at'], 'required'],
            [['expiry_date_time'], 'safe'],
            [['identifier'], 'string', 'max' => 255],
            [['identifier'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('oauth2', 'ID'),
            'access_token_id' => Yii::t('oauth2', 'Access Token ID'),
            'identifier' => Yii::t('oauth2', 'Identifier'),
            'expiry_date_time' => Yii::t('oauth2', 'Expiry Date Time'),
            'enabled' => Yii::t('oauth2', 'Enabled'),
            'created_at' => Yii::t('oauth2', 'Created At'),
            'updated_at' => Yii::t('oauth2', 'Updated At'),
        ];
    }
    
    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AccessTokenQueryInterface|\yii\db\ActiveQuery
     */
    public function getAccessToken()
    {
        return $this->hasOne(\rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken::className(), ['id' => 'access_token_id'])->inverseOf('refreshTokens');
    }


    
    /**
     * @inheritdoc
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2RefreshTokenQueryInterface|\yii\db\ActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return Yii::createObject(\rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2RefreshTokenQueryInterface::class, [get_called_class()]);
    }


}
