<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Polly;

use R2Offload\Vendor\Aws\Api\Serializer\JsonBody;
use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\Signature\SignatureV4;
use R2Offload\Vendor\GuzzleHttp\Psr7\Request;
use R2Offload\Vendor\GuzzleHttp\Psr7\Uri;
use R2Offload\Vendor\GuzzleHttp\Psr7;

/**
 * This client is used to interact with the **Amazon Polly** service.
 * @method \R2Offload\Vendor\Aws\Result deleteLexicon(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLexiconAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeVoices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeVoicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLexicon(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLexiconAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSpeechSynthesisTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSpeechSynthesisTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLexicons(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLexiconsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpeechSynthesisTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpeechSynthesisTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putLexicon(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putLexiconAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSpeechSynthesisTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSpeechSynthesisTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result synthesizeSpeech(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise synthesizeSpeechAsync(array $args = [])
 */
class PollyClient extends AwsClient
{
    /** @var JsonBody */
    private $formatter;

    /**
     * Create a pre-signed URL for Polly operation `SynthesizeSpeech`
     *
     * @param array $args parameters array for `SynthesizeSpeech`
     *                    More information @see Aws\Polly\PollyClient::SynthesizeSpeech
     *
     * @return string
     */
    public function createSynthesizeSpeechPreSignedUrl(array $args)
    {
        $uri = new Uri($this->getEndpoint());
        $uri = $uri->withPath('/v1/speech');

        // Formatting parameters follows rest-json protocol
        $this->formatter = $this->formatter ?: new JsonBody($this->getApi());
        $queryArray = json_decode(
            $this->formatter->build(
                $this->getApi()->getOperation('SynthesizeSpeech')->getInput(),
                $args
            ),
            true
        );

        // Mocking a 'GET' request in pre-signing the Url
        $query = Psr7\Query::build($queryArray);
        $uri = $uri->withQuery($query);

        $request = new Request('GET', $uri);
        $request = $request->withBody(Psr7\Utils::streamFor(''));
        $signer = new SignatureV4('polly', $this->getRegion());
        return (string) $signer->presign(
            $request,
            $this->getCredentials()->wait(),
            '+15 minutes'
        )->getUri();
    }
}
