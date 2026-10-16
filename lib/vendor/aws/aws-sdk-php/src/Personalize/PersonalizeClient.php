<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Personalize;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Personalize** service.
 * @method \R2Offload\Vendor\Aws\Result createBatchInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result createBatchInferenceJob(array{
 *     jobName?: string,
 *     solutionVersionArn?: string,
 *     filterArn?: string,
 *     numResults?: int,
 *     jobInput?: array{s3DataSource?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     roleArn?: string,
 *     batchInferenceJobConfig?: array{itemExplorationConfig?: array<string, string>, rankingInfluence?: array<string, float>, ...},
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     batchInferenceJobMode?: 'BATCH_INFERENCE'|'THEME_GENERATION',
 *     themeGenerationConfig?: array{fieldsForThemeGeneration?: array{itemName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBatchInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchInferenceJobAsync(array{
 *     jobName?: string,
 *     solutionVersionArn?: string,
 *     filterArn?: string,
 *     numResults?: int,
 *     jobInput?: array{s3DataSource?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     roleArn?: string,
 *     batchInferenceJobConfig?: array{itemExplorationConfig?: array<string, string>, rankingInfluence?: array<string, float>, ...},
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     batchInferenceJobMode?: 'BATCH_INFERENCE'|'THEME_GENERATION',
 *     themeGenerationConfig?: array{fieldsForThemeGeneration?: array{itemName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBatchSegmentJob(array $args = [])
 * @phpstan-method \Aws\Result createBatchSegmentJob(array{
 *     jobName?: string,
 *     solutionVersionArn?: string,
 *     filterArn?: string,
 *     numResults?: int,
 *     jobInput?: array{s3DataSource?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBatchSegmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBatchSegmentJobAsync(array{
 *     jobName?: string,
 *     solutionVersionArn?: string,
 *     filterArn?: string,
 *     numResults?: int,
 *     jobInput?: array{s3DataSource?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     name?: string,
 *     solutionVersionArn?: string,
 *     minProvisionedTPS?: int,
 *     campaignConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         enableMetadataWithRecommendations?: bool,
 *         syncWithLatestSolutionVersion?: bool,
 *         rankingInfluence?: array<string, float>,
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     name?: string,
 *     solutionVersionArn?: string,
 *     minProvisionedTPS?: int,
 *     campaignConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         enableMetadataWithRecommendations?: bool,
 *         syncWithLatestSolutionVersion?: bool,
 *         rankingInfluence?: array<string, float>,
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataDeletionJob(array $args = [])
 * @phpstan-method \Aws\Result createDataDeletionJob(array{
 *     jobName?: string,
 *     datasetGroupArn?: string,
 *     dataSource?: array{dataLocation?: string, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataDeletionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataDeletionJobAsync(array{
 *     jobName?: string,
 *     datasetGroupArn?: string,
 *     dataSource?: array{dataLocation?: string, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     name?: string,
 *     schemaArn?: string,
 *     datasetGroupArn?: string,
 *     datasetType?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     name?: string,
 *     schemaArn?: string,
 *     datasetGroupArn?: string,
 *     datasetType?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDatasetExportJob(array $args = [])
 * @phpstan-method \Aws\Result createDatasetExportJob(array{
 *     jobName?: string,
 *     datasetArn?: string,
 *     ingestionMode?: 'ALL'|'BULK'|'PUT',
 *     roleArn?: string,
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatasetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetExportJobAsync(array{
 *     jobName?: string,
 *     datasetArn?: string,
 *     ingestionMode?: 'ALL'|'BULK'|'PUT',
 *     roleArn?: string,
 *     jobOutput?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, ...},
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result createDatasetGroup(array{
 *     name?: string,
 *     roleArn?: string,
 *     kmsKeyArn?: string,
 *     domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND',
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetGroupAsync(array{
 *     name?: string,
 *     roleArn?: string,
 *     kmsKeyArn?: string,
 *     domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND',
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDatasetImportJob(array $args = [])
 * @phpstan-method \Aws\Result createDatasetImportJob(array{
 *     jobName?: string,
 *     datasetArn?: string,
 *     dataSource?: array{dataLocation?: string, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     importMode?: 'FULL'|'INCREMENTAL',
 *     publishAttributionMetricsToS3?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatasetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetImportJobAsync(array{
 *     jobName?: string,
 *     datasetArn?: string,
 *     dataSource?: array{dataLocation?: string, ...},
 *     roleArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     importMode?: 'FULL'|'INCREMENTAL',
 *     publishAttributionMetricsToS3?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEventTracker(array $args = [])
 * @phpstan-method \Aws\Result createEventTracker(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEventTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventTrackerAsync(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFilter(array $args = [])
 * @phpstan-method \Aws\Result createFilter(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     filterExpression?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFilterAsync(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     filterExpression?: string,
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMetricAttribution(array $args = [])
 * @phpstan-method \Aws\Result createMetricAttribution(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     metrics?: list<array{eventType?: string, metricName?: string, expression?: string, ...}>,
 *     metricsOutputConfig?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMetricAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMetricAttributionAsync(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     metrics?: list<array{eventType?: string, metricName?: string, expression?: string, ...}>,
 *     metricsOutputConfig?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRecommender(array $args = [])
 * @phpstan-method \Aws\Result createRecommender(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     recipeArn?: string,
 *     recommenderConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         minRecommendationRequestsPerSecond?: int,
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         enableMetadataWithRecommendations?: bool,
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommenderAsync(array{
 *     name?: string,
 *     datasetGroupArn?: string,
 *     recipeArn?: string,
 *     recommenderConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         minRecommendationRequestsPerSecond?: int,
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         enableMetadataWithRecommendations?: bool,
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSchema(array $args = [])
 * @phpstan-method \Aws\Result createSchema(array{name?: string, schema?: string, domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchemaAsync(array{name?: string, schema?: string, domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSolution(array $args = [])
 * @phpstan-method \Aws\Result createSolution(array{
 *     name?: string,
 *     performHPO?: bool,
 *     performAutoML?: bool,
 *     performAutoTraining?: bool,
 *     performIncrementalUpdate?: bool,
 *     recipeArn?: string,
 *     datasetGroupArn?: string,
 *     eventType?: string,
 *     solutionConfig?: array{
 *         eventValueThreshold?: string,
 *         hpoConfig?: array{hpoObjective?: array, hpoResourceConfig?: array, algorithmHyperParameterRanges?: array, ...},
 *         algorithmHyperParameters?: array<string, string>,
 *         featureTransformationParameters?: array<string, string>,
 *         autoMLConfig?: array{metricName?: string, recipeList?: list<string>, ...},
 *         eventsConfig?: array{eventParametersList?: list<array>, ...},
 *         optimizationObjective?: array{itemAttribute?: string, objectiveSensitivity?: 'HIGH'|'LOW'|'MEDIUM'|'OFF', ...},
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         autoTrainingConfig?: array{schedulingExpression?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSolutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSolutionAsync(array{
 *     name?: string,
 *     performHPO?: bool,
 *     performAutoML?: bool,
 *     performAutoTraining?: bool,
 *     performIncrementalUpdate?: bool,
 *     recipeArn?: string,
 *     datasetGroupArn?: string,
 *     eventType?: string,
 *     solutionConfig?: array{
 *         eventValueThreshold?: string,
 *         hpoConfig?: array{hpoObjective?: array, hpoResourceConfig?: array, algorithmHyperParameterRanges?: array, ...},
 *         algorithmHyperParameters?: array<string, string>,
 *         featureTransformationParameters?: array<string, string>,
 *         autoMLConfig?: array{metricName?: string, recipeList?: list<string>, ...},
 *         eventsConfig?: array{eventParametersList?: list<array>, ...},
 *         optimizationObjective?: array{itemAttribute?: string, objectiveSensitivity?: 'HIGH'|'LOW'|'MEDIUM'|'OFF', ...},
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         autoTrainingConfig?: array{schedulingExpression?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSolutionVersion(array $args = [])
 * @phpstan-method \Aws\Result createSolutionVersion(array{
 *     name?: string,
 *     solutionArn?: string,
 *     trainingMode?: 'AUTOTRAIN'|'FULL'|'UPDATE',
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSolutionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSolutionVersionAsync(array{
 *     name?: string,
 *     solutionArn?: string,
 *     trainingMode?: 'AUTOTRAIN'|'FULL'|'UPDATE',
 *     tags?: list<array{tagKey?: string, tagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{campaignArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{campaignArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{datasetArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{datasetArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDatasetGroup(array{datasetGroupArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetGroupAsync(array{datasetGroupArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEventTracker(array $args = [])
 * @phpstan-method \Aws\Result deleteEventTracker(array{eventTrackerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEventTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventTrackerAsync(array{eventTrackerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteFilter(array{filterArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFilterAsync(array{filterArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMetricAttribution(array $args = [])
 * @phpstan-method \Aws\Result deleteMetricAttribution(array{metricAttributionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMetricAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMetricAttributionAsync(array{metricAttributionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRecommender(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommender(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommenderAsync(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSchema(array $args = [])
 * @phpstan-method \Aws\Result deleteSchema(array{schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array{schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSolution(array $args = [])
 * @phpstan-method \Aws\Result deleteSolution(array{solutionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSolutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSolutionAsync(array{solutionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result describeAlgorithm(array{algorithmArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlgorithmAsync(array{algorithmArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBatchInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result describeBatchInferenceJob(array{batchInferenceJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBatchInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBatchInferenceJobAsync(array{batchInferenceJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBatchSegmentJob(array $args = [])
 * @phpstan-method \Aws\Result describeBatchSegmentJob(array{batchSegmentJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBatchSegmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBatchSegmentJobAsync(array{batchSegmentJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCampaign(array $args = [])
 * @phpstan-method \Aws\Result describeCampaign(array{campaignArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCampaignAsync(array{campaignArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDataDeletionJob(array $args = [])
 * @phpstan-method \Aws\Result describeDataDeletionJob(array{dataDeletionJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDataDeletionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataDeletionJobAsync(array{dataDeletionJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{datasetArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{datasetArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDatasetExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetExportJob(array{datasetExportJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatasetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetExportJobAsync(array{datasetExportJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDatasetGroup(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetGroup(array{datasetGroupArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatasetGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetGroupAsync(array{datasetGroupArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDatasetImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeDatasetImportJob(array{datasetImportJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatasetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetImportJobAsync(array{datasetImportJobArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventTracker(array $args = [])
 * @phpstan-method \Aws\Result describeEventTracker(array{eventTrackerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventTrackerAsync(array{eventTrackerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFeatureTransformation(array $args = [])
 * @phpstan-method \Aws\Result describeFeatureTransformation(array{featureTransformationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFeatureTransformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFeatureTransformationAsync(array{featureTransformationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFilter(array $args = [])
 * @phpstan-method \Aws\Result describeFilter(array{filterArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFilterAsync(array{filterArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMetricAttribution(array $args = [])
 * @phpstan-method \Aws\Result describeMetricAttribution(array{metricAttributionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMetricAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetricAttributionAsync(array{metricAttributionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRecipe(array $args = [])
 * @phpstan-method \Aws\Result describeRecipe(array{recipeArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecipeAsync(array{recipeArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRecommender(array $args = [])
 * @phpstan-method \Aws\Result describeRecommender(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecommenderAsync(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSchema(array $args = [])
 * @phpstan-method \Aws\Result describeSchema(array{schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSchemaAsync(array{schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSolution(array $args = [])
 * @phpstan-method \Aws\Result describeSolution(array{solutionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSolutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSolutionAsync(array{solutionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSolutionVersion(array $args = [])
 * @phpstan-method \Aws\Result describeSolutionVersion(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSolutionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSolutionVersionAsync(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSolutionMetrics(array $args = [])
 * @phpstan-method \Aws\Result getSolutionMetrics(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSolutionMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolutionMetricsAsync(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBatchInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listBatchInferenceJobs(array{solutionVersionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBatchInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchInferenceJobsAsync(array{solutionVersionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBatchSegmentJobs(array $args = [])
 * @phpstan-method \Aws\Result listBatchSegmentJobs(array{solutionVersionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBatchSegmentJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchSegmentJobsAsync(array{solutionVersionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listCampaigns(array{solutionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignsAsync(array{solutionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataDeletionJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataDeletionJobs(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataDeletionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataDeletionJobsAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasetExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listDatasetExportJobs(array{datasetArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetExportJobsAsync(array{datasetArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasetGroups(array $args = [])
 * @phpstan-method \Aws\Result listDatasetGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasetImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listDatasetImportJobs(array{datasetArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetImportJobsAsync(array{datasetArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEventTrackers(array $args = [])
 * @phpstan-method \Aws\Result listEventTrackers(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEventTrackersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventTrackersAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFilters(array $args = [])
 * @phpstan-method \Aws\Result listFilters(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFiltersAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMetricAttributionMetrics(array $args = [])
 * @phpstan-method \Aws\Result listMetricAttributionMetrics(array{metricAttributionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMetricAttributionMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricAttributionMetricsAsync(array{metricAttributionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMetricAttributions(array $args = [])
 * @phpstan-method \Aws\Result listMetricAttributions(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMetricAttributionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricAttributionsAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecipes(array $args = [])
 * @phpstan-method \Aws\Result listRecipes(array{
 *     recipeProvider?: 'SERVICE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecipesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecipesAsync(array{
 *     recipeProvider?: 'SERVICE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     domain?: 'ECOMMERCE'|'VIDEO_ON_DEMAND',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommenders(array $args = [])
 * @phpstan-method \Aws\Result listRecommenders(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendersAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSchemas(array $args = [])
 * @phpstan-method \Aws\Result listSchemas(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemasAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSolutionVersions(array $args = [])
 * @phpstan-method \Aws\Result listSolutionVersions(array{solutionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSolutionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolutionVersionsAsync(array{solutionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSolutions(array $args = [])
 * @phpstan-method \Aws\Result listSolutions(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSolutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolutionsAsync(array{datasetGroupArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startRecommender(array $args = [])
 * @phpstan-method \Aws\Result startRecommender(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecommenderAsync(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopRecommender(array $args = [])
 * @phpstan-method \Aws\Result stopRecommender(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRecommenderAsync(array{recommenderArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopSolutionVersionCreation(array $args = [])
 * @phpstan-method \Aws\Result stopSolutionVersionCreation(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopSolutionVersionCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSolutionVersionCreationAsync(array{solutionVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{tagKey?: string, tagValue?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{tagKey?: string, tagValue?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaign(array $args = [])
 * @phpstan-method \Aws\Result updateCampaign(array{
 *     campaignArn?: string,
 *     solutionVersionArn?: string,
 *     minProvisionedTPS?: int,
 *     campaignConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         enableMetadataWithRecommendations?: bool,
 *         syncWithLatestSolutionVersion?: bool,
 *         rankingInfluence?: array<string, float>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignAsync(array{
 *     campaignArn?: string,
 *     solutionVersionArn?: string,
 *     minProvisionedTPS?: int,
 *     campaignConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         enableMetadataWithRecommendations?: bool,
 *         syncWithLatestSolutionVersion?: bool,
 *         rankingInfluence?: array<string, float>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataset(array{datasetArn?: string, schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetAsync(array{datasetArn?: string, schemaArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMetricAttribution(array $args = [])
 * @phpstan-method \Aws\Result updateMetricAttribution(array{
 *     addMetrics?: list<array{eventType?: string, metricName?: string, expression?: string, ...}>,
 *     removeMetrics?: list<string>,
 *     metricsOutputConfig?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, roleArn?: string, ...},
 *     metricAttributionArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMetricAttributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMetricAttributionAsync(array{
 *     addMetrics?: list<array{eventType?: string, metricName?: string, expression?: string, ...}>,
 *     removeMetrics?: list<string>,
 *     metricsOutputConfig?: array{s3DataDestination?: array{path?: string, kmsKeyArn?: string, ...}, roleArn?: string, ...},
 *     metricAttributionArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRecommender(array $args = [])
 * @phpstan-method \Aws\Result updateRecommender(array{
 *     recommenderArn?: string,
 *     recommenderConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         minRecommendationRequestsPerSecond?: int,
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         enableMetadataWithRecommendations?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRecommenderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecommenderAsync(array{
 *     recommenderArn?: string,
 *     recommenderConfig?: array{
 *         itemExplorationConfig?: array<string, string>,
 *         minRecommendationRequestsPerSecond?: int,
 *         trainingDataConfig?: array{
 *             excludedDatasetColumns?: array<string, list<string>>,
 *             includedDatasetColumns?: array<string, list<string>>,
 *             ...,
 *         },
 *         enableMetadataWithRecommendations?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSolution(array $args = [])
 * @phpstan-method \Aws\Result updateSolution(array{
 *     solutionArn?: string,
 *     performAutoTraining?: bool,
 *     performIncrementalUpdate?: bool,
 *     solutionUpdateConfig?: array{
 *         autoTrainingConfig?: array{schedulingExpression?: string, ...},
 *         eventsConfig?: array{eventParametersList?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSolutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSolutionAsync(array{
 *     solutionArn?: string,
 *     performAutoTraining?: bool,
 *     performIncrementalUpdate?: bool,
 *     solutionUpdateConfig?: array{
 *         autoTrainingConfig?: array{schedulingExpression?: string, ...},
 *         eventsConfig?: array{eventParametersList?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class PersonalizeClient extends AwsClient {}
