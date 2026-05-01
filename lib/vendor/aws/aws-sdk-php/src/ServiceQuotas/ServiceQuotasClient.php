<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ServiceQuotas;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Service Quotas** service.
 * @method \R2Offload\Vendor\Aws\Result associateServiceQuotaTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateServiceQuotaTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSupportCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSupportCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteServiceQuotaIncreaseRequestFromTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceQuotaIncreaseRequestFromTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateServiceQuotaTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateServiceQuotaTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAWSDefaultServiceQuota(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAWSDefaultServiceQuotaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssociationForServiceQuotaTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssociationForServiceQuotaTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAutoManagementConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAutoManagementConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQuotaUtilizationReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQuotaUtilizationReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRequestedServiceQuotaChange(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRequestedServiceQuotaChangeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceQuota(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceQuotaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceQuotaIncreaseRequestFromTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceQuotaIncreaseRequestFromTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAWSDefaultServiceQuotas(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAWSDefaultServiceQuotasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRequestedServiceQuotaChangeHistory(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRequestedServiceQuotaChangeHistoryByQuota(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryByQuotaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceQuotaIncreaseRequestsInTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceQuotaIncreaseRequestsInTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceQuotas(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceQuotasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putServiceQuotaIncreaseRequestIntoTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putServiceQuotaIncreaseRequestIntoTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result requestServiceQuotaIncrease(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise requestServiceQuotaIncreaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAutoManagement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAutoManagementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQuotaUtilizationReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQuotaUtilizationReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopAutoManagement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopAutoManagementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAutoManagement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAutoManagementAsync(array $args = [])
 */
class ServiceQuotasClient extends AwsClient {}
