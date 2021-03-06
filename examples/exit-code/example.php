<?php

/*
 * This file is part of the andreas-weber/php-runner library.
 *
 * (c) Andreas Weber <code@andreas-weber.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use AndreasWeber\Runner\Example\Task1;
use AndreasWeber\Runner\Example\Task2;
use AndreasWeber\Runner\Example\TaskExitCode;
use AndreasWeber\Runner\Payload\ArrayPayload;
use AndreasWeber\Runner\Runner;
use AndreasWeber\Runner\Task\Collection;

require_once __DIR__ . '/../resources/bootstrap.php';

$collection = new Collection();
$collection->addTask(new Task1());
$collection->addTask(new Task2());

// trigger an exception, when exit code is not equal zero or null
$taskExitCode = new TaskExitCode();
$taskExitCode->setFailOnError(true);

$collection->addTask($taskExitCode);

$payload = new ArrayPayload();
$runner = new Runner($collection, $logger);

// we're awaiting an exception
$runner->run($payload);
