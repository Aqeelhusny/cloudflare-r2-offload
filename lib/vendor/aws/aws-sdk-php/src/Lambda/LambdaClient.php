<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Lambda;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Aws\Middleware;

/**
 * This client is used to interact with AWS Lambda
 *
 * @method \R2Offload\Vendor\Aws\Result addLayerVersionPermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addLayerVersionPermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addPermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addPermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result checkpointDurableExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise checkpointDurableExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCapacityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCapacityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEventSourceMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEventSourceMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFunction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFunctionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFunctionUrlConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFunctionUrlConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCapacityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCapacityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEventSourceMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEventSourceMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFunction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFunctionCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFunctionConcurrency(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionConcurrencyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFunctionEventInvokeConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionEventInvokeConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFunctionUrlConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionUrlConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLayerVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLayerVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProvisionedConcurrencyConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProvisionedConcurrencyConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCapacityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCapacityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDurableExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDurableExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDurableExecutionHistory(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDurableExecutionHistoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDurableExecutionState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDurableExecutionStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEventSourceMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEventSourceMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionConcurrency(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionConcurrencyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionEventInvokeConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionEventInvokeConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionRecursionConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionRecursionConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionScalingConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionScalingConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFunctionUrlConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionUrlConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLayerVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLayerVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLayerVersionByArn(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLayerVersionByArnAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLayerVersionPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLayerVersionPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProvisionedConcurrencyConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProvisionedConcurrencyConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRuntimeManagementConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRuntimeManagementConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invoke(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeAsynchronous(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeAsynchronousAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeWithResponseStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeWithResponseStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAliases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCapacityProviders(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCapacityProvidersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCodeSigningConfigs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCodeSigningConfigsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDurableExecutionsByFunction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDurableExecutionsByFunctionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEventSourceMappings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEventSourceMappingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFunctionEventInvokeConfigs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionEventInvokeConfigsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFunctionUrlConfigs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionUrlConfigsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFunctionVersionsByCapacityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionVersionsByCapacityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFunctions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFunctionsByCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionsByCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLayerVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLayerVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLayers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLayersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProvisionedConcurrencyConfigs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProvisionedConcurrencyConfigsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVersionsByFunction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVersionsByFunctionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result publishLayerVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishLayerVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result publishVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFunctionCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFunctionCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFunctionConcurrency(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFunctionConcurrencyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFunctionEventInvokeConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFunctionEventInvokeConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFunctionRecursionConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFunctionRecursionConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFunctionScalingConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFunctionScalingConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putProvisionedConcurrencyConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putProvisionedConcurrencyConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRuntimeManagementConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRuntimeManagementConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeLayerVersionPermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeLayerVersionPermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendDurableExecutionCallbackFailure(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendDurableExecutionCallbackFailureAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendDurableExecutionCallbackHeartbeat(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendDurableExecutionCallbackHeartbeatAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendDurableExecutionCallbackSuccess(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendDurableExecutionCallbackSuccessAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopDurableExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDurableExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCapacityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCapacityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCodeSigningConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCodeSigningConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEventSourceMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEventSourceMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFunctionCode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFunctionCodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFunctionConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFunctionConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFunctionEventInvokeConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFunctionEventInvokeConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFunctionUrlConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFunctionUrlConfigAsync(array $args = [])
 */
class LambdaClient extends AwsClient
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $args)
    {
        parent::__construct($args);
        $list = $this->getHandlerList();
        if (extension_loaded('curl')) {
            $list->appendInit($this->getDefaultCurlOptionsMiddleware());
        }
    }

    /**
     * Provides a middleware that sets default Curl options for the command
     *
     * @return callable
     */
    public function getDefaultCurlOptionsMiddleware()
    {
        return Middleware::mapCommand(function (CommandInterface $cmd) {
            $defaultCurlOptions = [
                CURLOPT_TCP_KEEPALIVE => 1,
            ];
            if (!isset($cmd['@http']['curl'])) {
                $cmd['@http']['curl'] = $defaultCurlOptions;
            } else {
                $cmd['@http']['curl'] += $defaultCurlOptions;
            }
            return $cmd;
        });
    }
}
