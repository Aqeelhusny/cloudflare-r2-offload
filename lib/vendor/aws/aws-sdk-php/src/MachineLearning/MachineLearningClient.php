<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MachineLearning;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\GuzzleHttp\Psr7\Uri;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;

/**
 * Amazon Machine Learning client.
 *
 * @method \R2Offload\Vendor\Aws\Result addTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBatchPrediction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBatchPredictionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataSourceFromRDS(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataSourceFromRDSAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataSourceFromRedshift(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataSourceFromRedshiftAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataSourceFromS3(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataSourceFromS3Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEvaluation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEvaluationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMLModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMLModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRealtimeEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRealtimeEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBatchPrediction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBatchPredictionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataSource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEvaluation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEvaluationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMLModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMLModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRealtimeEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRealtimeEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBatchPredictions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBatchPredictionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDataSources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDataSourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEvaluations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEvaluationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMLModels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMLModelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBatchPrediction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBatchPredictionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataSource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEvaluation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEvaluationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMLModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMLModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result predict(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise predictAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBatchPrediction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBatchPredictionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataSource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEvaluation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEvaluationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMLModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMLModelAsync(array $args = [])
 */
class MachineLearningClient extends AwsClient
{
    public function __construct(array $config)
    {
        parent::__construct($config);
        $list = $this->getHandlerList();
        $list->appendBuild($this->predictEndpoint(), 'ml.predict_endpoint');
    }

    /**
     * Changes the endpoint of the Predict operation to the provided endpoint.
     *
     * @return callable
     */
    private function predictEndpoint()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'Predict') {
                    $request = $request->withUri(new Uri($command['PredictEndpoint']));
                }
                return $handler($command, $request);
            };
        };
    }
}
