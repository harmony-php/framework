<?php

namespace Harmony\Framework\Model\Hydration;

use Harmony\DAL\Model;
use Harmony\DAL\Model\Hydration\Extractor as ExtractorInterface;

class Extractor implements ExtractorInterface
{
    public function extract(Model $model): object
    {
        // Check the instance of the model and call the extract method of a specific model extractor here

        return (object) [];
    }
}
