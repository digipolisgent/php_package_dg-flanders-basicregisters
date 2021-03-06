<?php

declare(strict_types=1);

namespace DigipolisGent\Flanders\BasicRegisters;

use DigipolisGent\API\Cache\CacheableInterface;
use DigipolisGent\API\Logger\LoggableInterface;
use DigipolisGent\Flanders\BasicRegisters\Service\AddressServiceInterface;
use DigipolisGent\Flanders\BasicRegisters\Service\MunicipalityNameServiceInterface;
use DigipolisGent\Flanders\BasicRegisters\Service\PostInfoServiceInterface;
use DigipolisGent\Flanders\BasicRegisters\Service\StreetNameServiceInterface;

/**
 * Container of all BasicRegister services.
 */
interface BasicRegisterInterface extends CacheableInterface, LoggableInterface
{
    /**
     * Get the address(es) related service.
     *
     * @return \DigipolisGent\Flanders\BasicRegisters\Service\AddressServiceInterface
     */
    public function address(): AddressServiceInterface;

    /**
     * Get the municipality name related service.
     *
     * @return \DigipolisGent\Flanders\BasicRegisters\Service\MunicipalityNameServiceInterface
     */
    public function municipalityName(): MunicipalityNameServiceInterface;

    /**
     * Get the street name related service.
     *
     * @return \DigipolisGent\Flanders\BasicRegisters\Service\StreetNameServiceInterface
     */
    public function streetName(): StreetNameServiceInterface;

    /**
     * Get the post info related service.
     *
     * @return \DigipolisGent\Flanders\BasicRegisters\Service\PostInfoServiceInterface
     */
    public function postInfo(): PostInfoServiceInterface;
}
