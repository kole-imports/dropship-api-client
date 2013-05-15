<?php
namespace Application\tests;

use Guzzle\Tests;
use Aws\Common;

GuzzleTestCase::setServiceBuilder(Aws::factory($_SERVER['CONFIG']));

Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Guzzle\Service\Builder\ServiceBuilder::factory(array(
    'test.unfuddle' => array(
        'class' => 'Guzzle.Unfuddle.UnfuddleClient',
        'params' => array(
            'username' => 'test_user',
            'password' => '****',
            'subdomain' => 'test'
        )
    )
)));