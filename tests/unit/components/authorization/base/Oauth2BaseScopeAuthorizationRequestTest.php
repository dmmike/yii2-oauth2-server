<?php

namespace Yii2Oauth2ServerTests\unit\components\authorization\base;

use rhertogh\Yii2Oauth2Server\components\authorization\base\Oauth2BaseClientScopeAuthorizationRequest;
use rhertogh\Yii2Oauth2Server\models\Oauth2Scope;
use Yii2Oauth2ServerTests\unit\TestCase;

/**
 * @covers \rhertogh\Yii2Oauth2Server\components\authorization\base\Oauth2BaseClientScopeAuthorizationRequest
 */
class Oauth2BaseScopeAuthorizationRequestTest extends TestCase
{
    public function testGetSetScope()
    {
        $this->mockWebApplication();
        $scope = new class extends Oauth2Scope {
            public function hasAttribute($name)
            {
                return false;
            }
            public function loadDefaultValues($skipIfSet = true)
            {
            }
        };
        $baseScopeAuthorizationRequest = $this->getMockBaseScopeAuthorizationRequest();

        $baseScopeAuthorizationRequest->setScope($scope);
        $this->assertEquals($scope, $baseScopeAuthorizationRequest->getScope());
    }

    public function testGetSetIsRequired()
    {
        $baseScopeAuthorizationRequest = $this->getMockBaseScopeAuthorizationRequest();

        $this->assertTrue($baseScopeAuthorizationRequest->getIsRequired());
        $baseScopeAuthorizationRequest->setIsRequired(false);
        $this->assertFalse($baseScopeAuthorizationRequest->getIsRequired());
        $baseScopeAuthorizationRequest->setIsRequired(true);
        $this->assertTrue($baseScopeAuthorizationRequest->getIsRequired());
    }

    public function testGetSetIsAccepted()
    {
        $baseScopeAuthorizationRequest = $this->getMockBaseScopeAuthorizationRequest();

        $this->assertFalse($baseScopeAuthorizationRequest->getIsAccepted());
        $baseScopeAuthorizationRequest->setIsAccepted(true);
        $this->assertTrue($baseScopeAuthorizationRequest->getIsAccepted());
        $baseScopeAuthorizationRequest->setIsAccepted(false);
        $this->assertFalse($baseScopeAuthorizationRequest->getIsAccepted());
    }

    public function testGetSetHasBeenRejectedBefore()
    {
        $baseScopeAuthorizationRequest = $this->getMockBaseScopeAuthorizationRequest();

        $this->assertFalse($baseScopeAuthorizationRequest->getHasBeenRejectedBefore());
        $baseScopeAuthorizationRequest->setHasBeenRejectedBefore(true);
        $this->assertTrue($baseScopeAuthorizationRequest->getHasBeenRejectedBefore());
        $baseScopeAuthorizationRequest->setHasBeenRejectedBefore(false);
        $this->assertFalse($baseScopeAuthorizationRequest->getHasBeenRejectedBefore());
    }

    protected function getMockBaseScopeAuthorizationRequest()
    {
        return $this->getMockForAbstractClass(
            Oauth2BaseClientScopeAuthorizationRequest::class,
        );
    }
}
