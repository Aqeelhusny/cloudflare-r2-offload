<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Api\Parser;

use R2Offload\Vendor\Aws\Api\Service;
use R2Offload\Vendor\Aws\Api\StructureShape;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Aws\ResultInterface;
use R2Offload\Vendor\GuzzleHttp\Psr7\CachingStream;
use R2Offload\Vendor\Psr\Http\Message\ResponseInterface;
use R2Offload\Vendor\Psr\Http\Message\StreamInterface;

/**
 * @internal
 */
abstract class AbstractParser
{
    /** @var \R2Offload\Vendor\Aws\Api\Service Representation of the service API*/
    protected $api;

    /** @var callable */
    protected $parser;

    /**
     * @param Service $api Service description.
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    /**
     * @param CommandInterface  $command  Command that was executed.
     * @param ResponseInterface $response Response that was received.
     *
     * @return ResultInterface
     */
    abstract public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    );

    abstract public function parseMemberFromStream(
        StreamInterface $stream,
        StructureShape $member,
        $response
    );

    public static function getBodyContents(ResponseInterface $response): string
    {
        $body = $response->getBody();
        if ($body->isSeekable()) {
            $body->rewind();
        }

        return $body->getContents();
    }

    public static function getResponseWithCachingStream(
        ResponseInterface $response
    ): ResponseInterface
    {
        if (!$response->getBody()->isSeekable()) {
            return $response->withBody(
                new CachingStream($response->getBody())
            );
        }

        return $response;
    }
}
