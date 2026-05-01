<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\EndpointV2\Rule;

use R2Offload\Vendor\Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use R2Offload\Vendor\Aws\Exception\UnresolvedEndpointException;

class ErrorRule extends AbstractRule
{
    /** @var array */
    private $error;

    public function __construct($definition)
    {
        parent::__construct($definition);
        $this->error = $definition['error'];
    }

    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * If an error rule's conditions are met, raise an
     * UnresolvedEndpointError containing the fully resolved error string.
     *
     * @return null
     * @throws UnresolvedEndpointException
     */
    public function evaluate(
        array $inputParameters,
        RulesetStandardLibrary $standardLibrary
    )
    {
        if ($this->evaluateConditions($inputParameters, $standardLibrary)) {
            $message = $standardLibrary->resolveValue($this->error, $inputParameters);
            throw new UnresolvedEndpointException($message);
        }
        return false;
    }
}
