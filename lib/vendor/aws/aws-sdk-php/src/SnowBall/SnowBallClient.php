<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SnowBall;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Import/Export Snowball** service.
 * @method \R2Offload\Vendor\Aws\Result cancelCluster(array $args = [])
 * @phpstan-method \Aws\Result cancelCluster(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAddress(array $args = [])
 * @phpstan-method \Aws\Result createAddress(array{
 *     Address?: array{
 *         AddressId?: string,
 *         Name?: string,
 *         Company?: string,
 *         Street1?: string,
 *         Street2?: string,
 *         Street3?: string,
 *         City?: string,
 *         StateOrProvince?: string,
 *         PrefectureOrDistrict?: string,
 *         Landmark?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         PhoneNumber?: string,
 *         IsRestricted?: bool,
 *         Type?: 'AWS_SHIP'|'CUST_PICKUP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddressAsync(array{
 *     Address?: array{
 *         AddressId?: string,
 *         Name?: string,
 *         Company?: string,
 *         Street1?: string,
 *         Street2?: string,
 *         Street3?: string,
 *         City?: string,
 *         StateOrProvince?: string,
 *         PrefectureOrDistrict?: string,
 *         Landmark?: string,
 *         Country?: string,
 *         PostalCode?: string,
 *         PhoneNumber?: string,
 *         IsRestricted?: bool,
 *         Type?: 'AWS_SHIP'|'CUST_PICKUP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     JobType?: 'EXPORT'|'IMPORT'|'LOCAL_USE',
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     AddressId?: string,
 *     KmsKeyARN?: string,
 *     RoleARN?: string,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ForwardingAddressId?: string,
 *     TaxDocuments?: array{IND?: array{GSTIN?: string, ...}, ...},
 *     RemoteManagement?: 'INSTALLED_AUTOSTART'|'INSTALLED_ONLY'|'NOT_INSTALLED',
 *     InitialClusterSize?: int,
 *     ForceCreateJobs?: bool,
 *     LongTermPricingIds?: list<string>,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     JobType?: 'EXPORT'|'IMPORT'|'LOCAL_USE',
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     AddressId?: string,
 *     KmsKeyARN?: string,
 *     RoleARN?: string,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ForwardingAddressId?: string,
 *     TaxDocuments?: array{IND?: array{GSTIN?: string, ...}, ...},
 *     RemoteManagement?: 'INSTALLED_AUTOSTART'|'INSTALLED_ONLY'|'NOT_INSTALLED',
 *     InitialClusterSize?: int,
 *     ForceCreateJobs?: bool,
 *     LongTermPricingIds?: list<string>,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     JobType?: 'EXPORT'|'IMPORT'|'LOCAL_USE',
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     AddressId?: string,
 *     KmsKeyARN?: string,
 *     RoleARN?: string,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ClusterId?: string,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ForwardingAddressId?: string,
 *     TaxDocuments?: array{IND?: array{GSTIN?: string, ...}, ...},
 *     DeviceConfiguration?: array{SnowconeDeviceConfiguration?: array{WirelessConnection?: array, ...}, ...},
 *     RemoteManagement?: 'INSTALLED_AUTOSTART'|'INSTALLED_ONLY'|'NOT_INSTALLED',
 *     LongTermPricingId?: string,
 *     ImpactLevel?: 'IL2'|'IL4'|'IL5'|'IL6'|'IL99',
 *     PickupDetails?: array{
 *         Name?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         IdentificationNumber?: string,
 *         IdentificationExpirationDate?: int|string|\DateTimeInterface,
 *         IdentificationIssuingOrg?: string,
 *         DevicePickupId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     JobType?: 'EXPORT'|'IMPORT'|'LOCAL_USE',
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     Description?: string,
 *     AddressId?: string,
 *     KmsKeyARN?: string,
 *     RoleARN?: string,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ClusterId?: string,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ForwardingAddressId?: string,
 *     TaxDocuments?: array{IND?: array{GSTIN?: string, ...}, ...},
 *     DeviceConfiguration?: array{SnowconeDeviceConfiguration?: array{WirelessConnection?: array, ...}, ...},
 *     RemoteManagement?: 'INSTALLED_AUTOSTART'|'INSTALLED_ONLY'|'NOT_INSTALLED',
 *     LongTermPricingId?: string,
 *     ImpactLevel?: 'IL2'|'IL4'|'IL5'|'IL6'|'IL99',
 *     PickupDetails?: array{
 *         Name?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         IdentificationNumber?: string,
 *         IdentificationExpirationDate?: int|string|\DateTimeInterface,
 *         IdentificationIssuingOrg?: string,
 *         DevicePickupId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLongTermPricing(array $args = [])
 * @phpstan-method \Aws\Result createLongTermPricing(array{
 *     LongTermPricingType?: 'OneMonth'|'OneYear'|'ThreeYear',
 *     IsLongTermPricingAutoRenew?: bool,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLongTermPricingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLongTermPricingAsync(array{
 *     LongTermPricingType?: 'OneMonth'|'OneYear'|'ThreeYear',
 *     IsLongTermPricingAutoRenew?: bool,
 *     SnowballType?: 'EDGE'|'EDGE_C'|'EDGE_CG'|'EDGE_S'|'RACK_5U_C'|'SNC1_HDD'|'SNC1_SSD'|'STANDARD'|'V3_5C'|'V3_5S',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReturnShippingLabel(array $args = [])
 * @phpstan-method \Aws\Result createReturnShippingLabel(array{JobId?: string, ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReturnShippingLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReturnShippingLabelAsync(array{JobId?: string, ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAddress(array $args = [])
 * @phpstan-method \Aws\Result describeAddress(array{AddressId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAddressAsync(array{AddressId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAddresses(array $args = [])
 * @phpstan-method \Aws\Result describeAddresses(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAddressesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReturnShippingLabel(array $args = [])
 * @phpstan-method \Aws\Result describeReturnShippingLabel(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReturnShippingLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReturnShippingLabelAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobManifest(array $args = [])
 * @phpstan-method \Aws\Result getJobManifest(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobManifestAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobUnlockCode(array $args = [])
 * @phpstan-method \Aws\Result getJobUnlockCode(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobUnlockCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobUnlockCodeAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSnowballUsage(array $args = [])
 * @phpstan-method \Aws\Result getSnowballUsage(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSnowballUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSnowballUsageAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSoftwareUpdates(array $args = [])
 * @phpstan-method \Aws\Result getSoftwareUpdates(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSoftwareUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSoftwareUpdatesAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusterJobs(array $args = [])
 * @phpstan-method \Aws\Result listClusterJobs(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClusterJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterJobsAsync(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCompatibleImages(array $args = [])
 * @phpstan-method \Aws\Result listCompatibleImages(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCompatibleImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCompatibleImagesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLongTermPricing(array $args = [])
 * @phpstan-method \Aws\Result listLongTermPricing(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLongTermPricingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLongTermPricingAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPickupLocations(array $args = [])
 * @phpstan-method \Aws\Result listPickupLocations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPickupLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPickupLocationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceVersions(array $args = [])
 * @phpstan-method \Aws\Result listServiceVersions(array{
 *     ServiceName?: 'EKS_ANYWHERE'|'KUBERNETES',
 *     DependentServices?: list<array{ServiceName?: 'EKS_ANYWHERE'|'KUBERNETES', ServiceVersion?: array, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceVersionsAsync(array{
 *     ServiceName?: 'EKS_ANYWHERE'|'KUBERNETES',
 *     DependentServices?: list<array{ServiceName?: 'EKS_ANYWHERE'|'KUBERNETES', ServiceVersion?: array, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     ClusterId?: string,
 *     RoleARN?: string,
 *     Description?: string,
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     AddressId?: string,
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ForwardingAddressId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     ClusterId?: string,
 *     RoleARN?: string,
 *     Description?: string,
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     AddressId?: string,
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     ForwardingAddressId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJob(array $args = [])
 * @phpstan-method \Aws\Result updateJob(array{
 *     JobId?: string,
 *     RoleARN?: string,
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     AddressId?: string,
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Description?: string,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ForwardingAddressId?: string,
 *     PickupDetails?: array{
 *         Name?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         IdentificationNumber?: string,
 *         IdentificationExpirationDate?: int|string|\DateTimeInterface,
 *         IdentificationIssuingOrg?: string,
 *         DevicePickupId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobAsync(array{
 *     JobId?: string,
 *     RoleARN?: string,
 *     Notification?: array{
 *         SnsTopicARN?: string,
 *         JobStatesToNotify?: list<'Cancelled'|'Complete'|'InProgress'|'InTransitToAWS'|'InTransitToCustomer'|'Listing'|'New'|'Pending'|'PreparingAppliance'|'PreparingShipment'|'WithAWS'|'WithAWSSortingFacility'|'WithCustomer'>,
 *         NotifyAll?: bool,
 *         DevicePickupSnsTopicARN?: string,
 *         ...,
 *     },
 *     Resources?: array{S3Resources?: list<array>, LambdaResources?: list<array>, Ec2AmiResources?: list<array>, ...},
 *     OnDeviceServiceConfiguration?: array{
 *         NFSOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         TGWOnDeviceService?: array{StorageLimit?: int, StorageUnit?: 'TB', ...},
 *         EKSOnDeviceService?: array{KubernetesVersion?: string, EKSAnywhereVersion?: string, ...},
 *         S3OnDeviceService?: array{StorageLimit?: float, StorageUnit?: 'TB', ServiceSize?: int, FaultTolerance?: int, ...},
 *         ...,
 *     },
 *     AddressId?: string,
 *     ShippingOption?: 'EXPRESS'|'NEXT_DAY'|'SECOND_DAY'|'STANDARD',
 *     Description?: string,
 *     SnowballCapacityPreference?: 'NoPreference'|'T100'|'T13'|'T14'|'T240'|'T32'|'T42'|'T50'|'T8'|'T80'|'T98',
 *     ForwardingAddressId?: string,
 *     PickupDetails?: array{
 *         Name?: string,
 *         PhoneNumber?: string,
 *         Email?: string,
 *         IdentificationNumber?: string,
 *         IdentificationExpirationDate?: int|string|\DateTimeInterface,
 *         IdentificationIssuingOrg?: string,
 *         DevicePickupId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJobShipmentState(array $args = [])
 * @phpstan-method \Aws\Result updateJobShipmentState(array{JobId?: string, ShipmentState?: 'RECEIVED'|'RETURNED', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobShipmentStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobShipmentStateAsync(array{JobId?: string, ShipmentState?: 'RECEIVED'|'RETURNED', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLongTermPricing(array $args = [])
 * @phpstan-method \Aws\Result updateLongTermPricing(array{LongTermPricingId?: string, ReplacementJob?: string, IsLongTermPricingAutoRenew?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLongTermPricingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLongTermPricingAsync(array{LongTermPricingId?: string, ReplacementJob?: string, IsLongTermPricingAutoRenew?: bool, ...} $args = [])
 */
class SnowBallClient extends AwsClient {}
