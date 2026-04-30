<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws;

/**
 * Interface that allows implementing various incremental hashes.
 */
interface HashInterface
{
    /**
     * Adds data to the hash.
     *
     * @param string $data Data to add to the hash
     */
    public function update($data);

    /**
     * Finalizes the incremental hash and returns the resulting digest.
     *
     * @return string
     */
    public function complete();

    /**
     * Removes all data from the hash, effectively starting a new hash.
     */
    public function reset();
}
