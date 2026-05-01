<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Api\ErrorParser;

use R2Offload\Vendor\Aws\Api\Parser\AbstractParser;
use R2Offload\Vendor\Aws\Api\Parser\JsonParser;
use R2Offload\Vendor\Aws\Api\Service;
use R2Offload\Vendor\Aws\Api\StructureShape;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Psr\Http\Message\ResponseInterface;

/**
 * Parses JSON-REST errors.
 */
class RestJsonErrorParser extends AbstractErrorParser
{
    use JsonParserTrait;

    private $parser;

    public function __construct(?Service $api = null, ?JsonParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new JsonParser();
    }

    public function __invoke(
        ResponseInterface $response,
        ?CommandInterface $command = null
    ) {
        $response = AbstractParser::getResponseWithCachingStream($response);
        $data = $this->genericHandler($response);

        // Merge in error data from the JSON body
        if ($json = $data['parsed']) {
            $data = array_replace($json, $data);
        }

        // Correct error type from services like Amazon Glacier
        if (!empty($data['type'])) {
            $data['type'] = strtolower($data['type']);
        }

        // Retrieve error message directly
        $data['message'] = $data['parsed']['message']
            ?? $data['parsed']['Message']
            ?? $data['parsed']['error_description']
            ?? null;

        $this->populateShape($data, $response, $command);

        return $data;
    }
}
