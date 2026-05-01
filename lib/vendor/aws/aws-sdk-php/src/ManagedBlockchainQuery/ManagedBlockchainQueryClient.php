<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ManagedBlockchainQuery;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Blockchain Query** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetTokenBalance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetTokenBalanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssetContract(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssetContractAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTokenBalance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTokenBalanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTransaction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTransactionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssetContracts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssetContractsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFilteredTransactionEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFilteredTransactionEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTokenBalances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTokenBalancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTransactionEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTransactionEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTransactions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTransactionsAsync(array $args = [])
 */
class ManagedBlockchainQueryClient extends AwsClient {}
