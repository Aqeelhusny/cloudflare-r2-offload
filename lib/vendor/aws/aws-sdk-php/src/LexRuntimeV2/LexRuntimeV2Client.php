<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LexRuntimeV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Runtime V2** service.
 * @method \R2Offload\Vendor\Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSession(array $args = [])
 * @phpstan-method \Aws\Result putSession(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     messages?: list<array{
 *         content?: string,
 *         contentType?: 'CustomPayload'|'ImageResponseCard'|'PlainText'|'SSML',
 *         imageResponseCard?: array,
 *         ...,
 *     }>,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     responseContentType?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSessionAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     messages?: list<array{
 *         content?: string,
 *         contentType?: 'CustomPayload'|'ImageResponseCard'|'PlainText'|'SSML',
 *         imageResponseCard?: array,
 *         ...,
 *     }>,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     responseContentType?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result recognizeText(array $args = [])
 * @phpstan-method \Aws\Result recognizeText(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     text?: string,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise recognizeTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recognizeTextAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     text?: string,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result recognizeUtterance(array $args = [])
 * @phpstan-method \Aws\Result recognizeUtterance(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     sessionState?: string,
 *     requestAttributes?: string,
 *     requestContentType?: string,
 *     responseContentType?: string,
 *     inputStream?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise recognizeUtteranceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recognizeUtteranceAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     sessionState?: string,
 *     requestAttributes?: string,
 *     requestContentType?: string,
 *     responseContentType?: string,
 *     inputStream?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class LexRuntimeV2Client extends AwsClient {}
