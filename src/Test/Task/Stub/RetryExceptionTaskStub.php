<?php

/*
 * This file is part of the andreas-weber/php-runner library.
 *
 * (c) Andreas Weber <code@andreas-weber.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace AndreasWeber\Runner\Test\Task\Stub;

use AndreasWeber\Runner\Payload\PayloadInterface;
use AndreasWeber\Runner\Task\Exception\RetryException;

class RetryExceptionTaskStub extends RunCounterTaskStub
{
    public function run(PayloadInterface $payload)
    {
        parent::run($payload);

        if ($this->getRunsCount() < 2) {
            // 2 retries triggered by exception
            throw new RetryException();
        }

        return null;
    }
}
