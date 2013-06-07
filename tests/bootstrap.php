<?php
namespace tests;

use Guzzle\Tests;

Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Aws\Common\Aws::factory($_SERVER['CONFIG']));

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
