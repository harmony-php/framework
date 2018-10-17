<?php

namespace Harmony\Framework\Model\Hydration;

use Harmony\DAL\Model;
use Harmony\DAL\Model\Hydration\Hydrator as HydratorInterface;

class Hydrator implements HydratorInterface
{

    public function hydrate(object $raw): Model
    {
        // Check the instance of the model and call the hydrate method of a specific model hydrator here

        throw new \Exception('Hydrator not configured');
    }
}
