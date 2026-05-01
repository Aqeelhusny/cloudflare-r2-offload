<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SocialMessaging;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS End User Messaging Social** service.
 * @method \R2Offload\Vendor\Aws\Result associateWhatsAppBusinessAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateWhatsAppBusinessAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWhatsAppMessageTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWhatsAppMessageTemplateFromLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateFromLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWhatsAppMessageTemplateMedia(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateMediaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWhatsAppMessageMedia(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWhatsAppMessageMediaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWhatsAppMessageTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWhatsAppMessageTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateWhatsAppBusinessAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateWhatsAppBusinessAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLinkedWhatsAppBusinessAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLinkedWhatsAppBusinessAccountPhoneNumber(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountPhoneNumberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWhatsAppMessageMedia(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWhatsAppMessageMediaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWhatsAppMessageTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWhatsAppMessageTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLinkedWhatsAppBusinessAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLinkedWhatsAppBusinessAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWhatsAppMessageTemplates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWhatsAppMessageTemplatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWhatsAppTemplateLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWhatsAppTemplateLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result postWhatsAppMessageMedia(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise postWhatsAppMessageMediaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putWhatsAppBusinessAccountEventDestinations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putWhatsAppBusinessAccountEventDestinationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendWhatsAppMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendWhatsAppMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWhatsAppMessageTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWhatsAppMessageTemplateAsync(array $args = [])
 */
class SocialMessagingClient extends AwsClient {}
