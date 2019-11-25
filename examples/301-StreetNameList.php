<?php

/**
 * Example how to get a list of street names.
 */

use DigipolisGent\Flanders\BasicRegisters\BasicRegister;
use DigipolisGent\Flanders\BasicRegisters\Client\Client;
use DigipolisGent\Flanders\BasicRegisters\Configuration\Configuration;
use DigipolisGent\Flanders\BasicRegisters\Filter\Filters;
use DigipolisGent\Flanders\BasicRegisters\Filter\MunicipalityNameFilter;
use DigipolisGent\Flanders\BasicRegisters\Pager\Pager;

require_once __DIR__ . '/bootstrap.php';

printTitle('Get a list of the first 25 street names in Gent from the service.');

printStep('Create the API client configuration.');
$configuration = new Configuration($apiEndpoint, $apiUserKey);

printStep('Create the Guzzle client.');
$guzzleClient = new GuzzleHttp\Client(['base_uri' => $configuration->getUri()]);

printStep('Create the HTTP client.');
$client = new Client($guzzleClient, $configuration);

printStep('Create the Service wrapper.');
$service = new BasicRegister($client);

printStep('List of street names:');
$filters = new Filters(new MunicipalityNameFilter('gent'));
$streetNames = $service->streetName()->list($filters, new Pager(0, 25));

foreach ($streetNames as $streetName) {
    /** @var \DigipolisGent\Flanders\BasicRegisters\Value\Street\StreetName $municipalityName */
    printBullet('%s : %s', $streetName->streetNameId(), $streetName);
}

printFooter();