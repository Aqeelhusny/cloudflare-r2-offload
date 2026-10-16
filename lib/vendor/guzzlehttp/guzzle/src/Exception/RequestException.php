<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp\Exception;

use R2Offload\Vendor\GuzzleHttp\BodySummarizer;
use R2Offload\Vendor\GuzzleHttp\BodySummarizerInterface;
use R2Offload\Vendor\GuzzleHttp\Psr7\DiagnosticValue;
use R2Offload\Vendor\Psr\Http\Client\RequestExceptionInterface;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;
use R2Offload\Vendor\Psr\Http\Message\ResponseInterface;

/**
 * Base exception for request failures associated with a request.
 */
class RequestException extends TransferException implements RequestExceptionInterface
{
    public function __construct(
        string $message,
        RequestInterface $request,
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $request, $code, $previous);
    }

    /**
     * Factory method to create a new exception with a normalized error message
     *
     * @param RequestInterface             $request        Request sent
     * @param ResponseInterface|null       $response       Response received, if any
     * @param \Throwable|null              $previous       Previous exception
     * @param BodySummarizerInterface|null $bodySummarizer Optional body summarizer
     */
    public static function create(
        #[\SensitiveParameter]
        RequestInterface $request,
        #[\SensitiveParameter]
        ?ResponseInterface $response = null,
        #[\SensitiveParameter]
        ?\Throwable $previous = null,
        ?BodySummarizerInterface $bodySummarizer = null
    ): self {
        if (!$response) {
            return new self(
                'Error completing request',
                $request,
                0,
                $previous
            );
        }

        $level = (int) \floor($response->getStatusCode() / 100);
        if ($level === 4) {
            $label = 'Client error';
        } elseif ($level === 5) {
            $label = 'Server error';
        } else {
            $label = 'Unsuccessful request';
        }

        $uri = \R2Offload\Vendor\GuzzleHttp\Psr7\Utils::redactUriForMessage($request->getUri());

        // Client error: `GET /` resulted in a `404 Not Found` response: <html> ... (truncated)
        $message = \sprintf(
            '%s: `%s %s` resulted in a `%s %s` response',
            $label,
            DiagnosticValue::escape($request->getMethod()),
            $uri,
            $response->getStatusCode(),
            DiagnosticValue::escape($response->getReasonPhrase())
        );

        $summary = ($bodySummarizer ?? new BodySummarizer())->summarize($response);

        if ($summary !== null) {
            $message .= \sprintf(': %s', DiagnosticValue::escape($summary));
        }

        if ($level === 4) {
            return new ClientException($message, $request, $response, $previous);
        }

        if ($level === 5) {
            return new ServerException($message, $request, $response, $previous);
        }

        return new ResponseException($message, $request, $response, $previous);
    }
}
