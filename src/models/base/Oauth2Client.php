<?php

// This class was automatically generated by a giiant build task.
// You should not change it manually as it will be overwritten on next build.

namespace rhertogh\Yii2Oauth2Server\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth2_client".
 *
 * @property integer $id
 * @property string $identifier
 * @property string $name
 * @property integer $type
 * @property string $secret
 * @property string $old_secret
 * @property string $old_secret_valid_until
 * @property array $env_var_config
 * @property string $logo_uri
 * @property string $tos_uri
 * @property array $contacts
 * @property array $redirect_uris
 * @property array $post_logout_redirect_uris
 * @property boolean $allow_variable_redirect_uri_query
 * @property integer $token_types
 * @property integer $grant_types
 * @property boolean $allow_generic_scopes
 * @property boolean $exception_on_invalid_scope
 * @property boolean $end_users_may_authorize_client
 * @property integer $user_account_selection
 * @property boolean $allow_auth_code_without_pkce
 * @property boolean $skip_authorization_if_scope_is_allowed
 * @property integer $client_credentials_grant_user_id
 * @property boolean $oidc_allow_offline_access_without_consent
 * @property boolean $oidc_skip_logout_validation
 * @property string $oidc_userinfo_encrypted_response_alg
 * @property boolean $enabled
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken[] $accessTokens
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode[] $authCodes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2ClientScope[] $clientScopes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2Scope[] $scopes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2UserClient[] $userClients
 * @property string $aliasModel
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Oauth2Client extends \rhertogh\Yii2Oauth2Server\models\base\Oauth2BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier', 'name', 'created_at', 'updated_at'], 'required'],
            [['type', 'token_types', 'grant_types', 'user_account_selection', 'client_credentials_grant_user_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['type', 'token_types', 'grant_types', 'user_account_selection', 'client_credentials_grant_user_id', 'created_at', 'updated_at'], 'integer'],
            [['secret', 'old_secret'], 'string'],
            [['old_secret_valid_until', 'env_var_config', 'contacts', 'redirect_uris', 'post_logout_redirect_uris'], 'safe'],
            [['allow_variable_redirect_uri_query', 'allow_generic_scopes', 'exception_on_invalid_scope', 'end_users_may_authorize_client', 'allow_auth_code_without_pkce', 'skip_authorization_if_scope_is_allowed', 'oidc_allow_offline_access_without_consent', 'oidc_skip_logout_validation', 'enabled'], 'boolean'],
            [['identifier', 'name', 'logo_uri', 'tos_uri', 'oidc_userinfo_encrypted_response_alg'], 'string', 'max' => 255],
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
            'identifier' => Yii::t('oauth2', 'Identifier'),
            'name' => Yii::t('oauth2', 'Name'),
            'type' => Yii::t('oauth2', 'Type'),
            'secret' => Yii::t('oauth2', 'Secret'),
            'old_secret' => Yii::t('oauth2', 'Old Secret'),
            'old_secret_valid_until' => Yii::t('oauth2', 'Old Secret Valid Until'),
            'env_var_config' => Yii::t('oauth2', 'Env Var Config'),
            'logo_uri' => Yii::t('oauth2', 'Logo Uri'),
            'tos_uri' => Yii::t('oauth2', 'Tos Uri'),
            'contacts' => Yii::t('oauth2', 'Contacts'),
            'redirect_uris' => Yii::t('oauth2', 'Redirect Uris'),
            'post_logout_redirect_uris' => Yii::t('oauth2', 'Post Logout Redirect Uris'),
            'allow_variable_redirect_uri_query' => Yii::t('oauth2', 'Allow Variable Redirect Uri Query'),
            'token_types' => Yii::t('oauth2', 'Token Types'),
            'grant_types' => Yii::t('oauth2', 'Grant Types'),
            'allow_generic_scopes' => Yii::t('oauth2', 'Allow Generic Scopes'),
            'exception_on_invalid_scope' => Yii::t('oauth2', 'Exception On Invalid Scope'),
            'end_users_may_authorize_client' => Yii::t('oauth2', 'End Users May Authorize Client'),
            'user_account_selection' => Yii::t('oauth2', 'User Account Selection'),
            'allow_auth_code_without_pkce' => Yii::t('oauth2', 'Allow Auth Code Without Pkce'),
            'skip_authorization_if_scope_is_allowed' => Yii::t('oauth2', 'Skip Authorization If Scope Is Allowed'),
            'client_credentials_grant_user_id' => Yii::t('oauth2', 'Client Credentials Grant User ID'),
            'oidc_allow_offline_access_without_consent' => Yii::t('oauth2', 'Oidc Allow Offline Access Without Consent'),
            'oidc_skip_logout_validation' => Yii::t('oauth2', 'Oidc Skip Logout Validation'),
            'oidc_userinfo_encrypted_response_alg' => Yii::t('oauth2', 'Oidc Userinfo Encrypted Response Alg'),
            'enabled' => Yii::t('oauth2', 'Enabled'),
            'created_at' => Yii::t('oauth2', 'Created At'),
            'updated_at' => Yii::t('oauth2', 'Updated At'),
        ];
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AccessTokenQueryInterface     */
    public function getAccessTokens()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken::class, ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AuthCodeQueryInterface     */
    public function getAuthCodes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode::class, ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientScopeQueryInterface     */
    public function getClientScopes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2ClientScope::class, ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ScopeQueryInterface     */
    public function getScopes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2Scope::class, ['id' => 'scope_id'])->via('clientScopes');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2UserClientQueryInterface     */
    public function getUserClients()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2UserClient::class, ['client_id' => 'id'])->inverseOf('client');
    }



    /**
     * @inheritdoc
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientQueryInterface the active query used by this AR class.
     */
    public static function find()
    {
        return Yii::createObject(\rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientQueryInterface::class, [get_called_class()]);
    }
}
