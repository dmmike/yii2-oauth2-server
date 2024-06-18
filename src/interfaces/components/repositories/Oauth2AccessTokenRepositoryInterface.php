<?php

namespace rhertogh\Yii2Oauth2Server\interfaces\components\repositories;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;
use rhertogh\Yii2Oauth2Server\interfaces\components\repositories\base\Oauth2ModelRepositoryInterface;
use rhertogh\Yii2Oauth2Server\interfaces\models\Oauth2AccessTokenInterface;

interface Oauth2AccessTokenRepositoryInterface extends
    Oauth2ModelRepositoryInterface,
    AccessTokenRepositoryInterface
{
    # region Oauth2ModelRepositoryInterface methods (overwritten for type covariance)
    /**
     * @inheritDoc
     * @return Oauth2AccessTokenInterface|null
     */
    public function findModelByPk($pk);

    /**
     * @inheritDoc
     * @return Oauth2AccessTokenInterface|null
     */
    public function findModelByIdentifier($identifier);

    /**
     * @inheritDoc
     * @return Oauth2AccessTokenInterface|null
     */
    public function findModelByPkOrIdentifier($pkOrIdentifier);
    # endregion

    # region AccessTokenRepositoryInterface methods (overwritten for type covariance)
    /**
     * @inheritDoc
     * @return Oauth2AccessTokenInterface
     */
    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null);
    # endregion

    /**
     * Get the revocation validation for access tokens.
     * @return bool|callable For the behavior of the different types, please see setRevocationValidation()
     * @see setRevocationValidation()
     * @since 1.0.0
     */
    public function getRevocationValidation();

    /**
     * Get the revocation validation for access tokens.
     * @param bool|callable $validation The revocation validation behavior depends on the type/value:
     *  - callable: The callable will be called, its signature should be:
     *              ```php
     *              function(string $tokenIdentifier) {
     *                  return $isValid;
     *              }
     *              ```
     * - boolean:
     *   - true: Oauth2TokenInterface::isTokenRevoked() will be called
     *   - false: revocation validation is disabled.
     *
     * @return $this
     * @since 1.0.0
     */
    public function setRevocationValidation($validation);

    /**
     * @param int|string $userId
     * @return Oauth2AccessTokenInterface[]
     * @since 1.0.0
     */
    public function revokeAccessTokensByUserId($userId);
}
