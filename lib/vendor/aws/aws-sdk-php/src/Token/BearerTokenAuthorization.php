<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Token;

use InvalidArgumentException;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;

/**
 * Interface used to provide interchangeable strategies for adding authorization
 * to requests using the various AWS signature protocols.
 */
class BearerTokenAuthorization implements TokenAuthorization
{
    /**
     * Adds the specified token to a request by adding the required headers.
     *
     * @param RequestInterface     $request     Request to sign
     * @param TokenInterface       $token       Token
     *
     * @return RequestInterface Returns the modified request.
     */
    public function authorizeRequest(
        RequestInterface $request,
        TokenInterface $token
    ) {
        if (empty($token) || empty($token->getToken())) {
            throw new InvalidArgumentException(
                "Cannot authorize a request with an empty token"
            );
        }
        $accessToken = $token->getToken();
        return $request->withHeader('Authorization', "Bearer {$accessToken}");
    }
}
