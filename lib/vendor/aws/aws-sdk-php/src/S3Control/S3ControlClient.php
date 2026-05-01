<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3Control;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CacheInterface;
use R2Offload\Vendor\Aws\HandlerList;
use R2Offload\Vendor\Aws\S3\UseArnRegion\Configuration;
use R2Offload\Vendor\Aws\S3\UseArnRegion\ConfigurationInterface;
use R2Offload\Vendor\Aws\S3\UseArnRegion\ConfigurationProvider as UseArnRegionConfigurationProvider;
use R2Offload\Vendor\GuzzleHttp\Promise\PromiseInterface;

/**
 * This client is used to interact with the **AWS S3 Control** service.
 * @method \R2Offload\Vendor\Aws\Result associateAccessGrantsIdentityCenter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAccessGrantsIdentityCenterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAccessGrant(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessGrantAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAccessGrantsInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessGrantsInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAccessGrantsLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessGrantsLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAccessPointForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMultiRegionAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMultiRegionAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStorageLensGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStorageLensGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessGrant(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessGrantAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessGrantsInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessGrantsInstanceResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessGrantsLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessGrantsLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPointForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPointPolicyForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPointScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteJobTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteJobTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMultiRegionAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMultiRegionAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStorageLensConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStorageLensConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStorageLensConfigurationTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStorageLensConfigurationTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStorageLensGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStorageLensGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMultiRegionAccessPointOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMultiRegionAccessPointOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result dissociateAccessGrantsIdentityCenter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise dissociateAccessGrantsIdentityCenterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessGrant(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessGrantAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessGrantsInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessGrantsInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessGrantsInstanceForPrefix(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessGrantsInstanceForPrefixAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessGrantsInstanceResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessGrantsLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessGrantsLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointConfigurationForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointConfigurationForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointPolicyForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointPolicyStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointPolicyStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointPolicyStatusForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointPolicyStatusForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPointScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketVersioning(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataAccess(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAccessAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMultiRegionAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMultiRegionAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMultiRegionAccessPointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMultiRegionAccessPointPolicyStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMultiRegionAccessPointPolicyStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMultiRegionAccessPointRoutes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMultiRegionAccessPointRoutesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStorageLensConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStorageLensConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStorageLensConfigurationTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStorageLensConfigurationTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStorageLensGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStorageLensGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessGrants(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessGrantsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessGrantsInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessGrantsInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessGrantsLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessGrantsLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessPoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessPointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessPointsForDirectoryBuckets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessPointsForDirectoryBucketsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessPointsForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessPointsForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCallerAccessGrants(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCallerAccessGrantsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMultiRegionAccessPoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMultiRegionAccessPointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRegionalBuckets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRegionalBucketsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStorageLensConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStorageLensConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStorageLensGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStorageLensGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccessGrantsInstanceResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccessGrantsInstanceResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccessPointConfigurationForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccessPointConfigurationForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccessPointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccessPointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccessPointPolicyForObjectLambda(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccessPointPolicyForObjectLambdaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccessPointScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccessPointScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketVersioning(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putJobTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putJobTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putMultiRegionAccessPointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putMultiRegionAccessPointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putStorageLensConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putStorageLensConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putStorageLensConfigurationTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putStorageLensConfigurationTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result submitMultiRegionAccessPointRoutes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise submitMultiRegionAccessPointRoutesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccessGrantsLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccessGrantsLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJobPriority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobPriorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJobStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStorageLensGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStorageLensGroupAsync(array $args = [])
 */
class S3ControlClient extends AwsClient 
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        return $args + [
            'use_dual_stack_endpoint' => [
                'type' => 'config',
                'valid' => ['bool'],
                'doc' => 'Set to true to send requests to an S3 Control Dual Stack'
                    . ' endpoint by default, which enables IPv6 Protocol.'
                    . ' Can be enabled or disabled on individual operations by setting'
                    . ' \'@use_dual_stack_endpoint\' to true or false.',
                'default' => false,
            ],
            'use_arn_region' => [
                'type'    => 'config',
                'valid'   => [
                    'bool',
                    Configuration::class,
                    CacheInterface::class,
                    'callable'
                ],
                'doc'     => 'Set to true to allow passed in ARNs to override'
                    . ' client region. Accepts...',
                'fn' => [__CLASS__, '_apply_use_arn_region'],
                'default' => [UseArnRegionConfigurationProvider::class, 'defaultProvider'],
            ],
        ];
    }

    public static function _apply_use_arn_region($value, array &$args, HandlerList $list)
    {
        if ($value instanceof CacheInterface) {
            $value = UseArnRegionConfigurationProvider::defaultProvider($args);
        }
        if (is_callable($value)) {
            $value = $value();
        }
        if ($value instanceof PromiseInterface) {
            $value = $value->wait();
        }
        if ($value instanceof ConfigurationInterface) {
            $args['use_arn_region'] = $value;
        } else {
            // The Configuration class itself will validate other inputs
            $args['use_arn_region'] = new Configuration($value);
        }
    }

    /**
     * {@inheritdoc}
     *
     * In addition to the options available to
     * {@see Aws\AwsClient::__construct}, S3ControlClient accepts the following
     * option:
     *
     * - use_dual_stack_endpoint: (bool) Set to true to send requests to an S3
     *   Control Dual Stack endpoint by default, which enables IPv6 Protocol.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_dual_stack_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        parent::__construct($args);

        if ($this->isUseEndpointV2()) {
            $this->processEndpointV2Model();
        } else {
            $stack = $this->getHandlerList();
            $stack->appendBuild(
                EndpointArnMiddleware::wrap(
                    $this->getApi(),
                    $this->getRegion(),
                    [
                        'use_arn_region' => $this->getConfig('use_arn_region'),
                        'dual_stack' =>
                            $this->getConfig('use_dual_stack_endpoint')->isUseDualStackEndpoint(),
                        'endpoint' => isset($args['endpoint'])
                            ? $args['endpoint']
                            : null,
                        'use_fips_endpoint' => $this->getConfig('use_fips_endpoint'),
                    ],
                    $this->isUseEndpointV2()
                ),
                's3control.endpoint_arn_middleware'
            );
        }
    }

    /**
     * Modifies API definition to remove `AccountId`
     * host prefix.  This is now handled by the endpoint ruleset.
     *
     * @return void
     *
     * @internal
     */
    private function processEndpointV2Model()
    {
        $definition = $this->getApi()->getDefinition();
        $this->removeHostPrefix($definition);
        $this->removeRequiredMember($definition);
        $this->getApi()->setDefinition($definition);
    }

    private function removeHostPrefix(&$definition)
    {
        foreach($definition['operations'] as &$operation) {
            if (isset($operation['endpoint']['hostPrefix'])
                && $operation['endpoint']['hostPrefix'] === '{AccountId}.'
            ) {
                $operation['endpoint']['hostPrefix'] = str_replace(
                    '{AccountId}.',
                    '',
                    $operation['endpoint']['hostPrefix']
                );
            }
        }
    }

    private function removeRequiredMember(&$definition)
    {
        foreach($definition['shapes'] as &$shape) {
            if (isset($shape['required'])
            ) {
                $found = array_search('AccountId', $shape['required']);

                if ($found !== false) {
                    unset($shape['required'][$found]);
                }
            }
        }
    }
}
