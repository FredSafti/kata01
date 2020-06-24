<?php

namespace App\Repository;

use App\Enum\Source;

class RepositoryFactory
{
    /**
     * @param string $source
     * @param string $path
     * @return BiensRepository
     */
    public function createRepository(string $source, string $path)
    {
        switch($source) {
            case Source::API:
                return new APIRepository($path);
            case Source::CSV:
                return new CSVRepository($path);
        }

        throw new \LogicException('Cannot find repository for ' . $source);
    }
}