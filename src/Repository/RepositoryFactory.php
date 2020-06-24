<?php

namespace App\Repository;

use App\Enum\Divergence;

class RepositoryFactory
{
    /**
     * @param string $divergence
     * @return BiensRepository
     */
    public function createRepositoryFromDivergence(string $divergence)
    {
        switch($divergence) {
            case Divergence::SAFTI:
                return new APIRepository(
                    'http://omega.dev.safti.local/Git/Frederic/kata01-api/biens.csv'
                );

            case Divergence::SAFTI_ES:
                return new CSVRepository('data/biens-ES.csv');

            case Divergence::MEGAGENCE:
                return new APIRepository(
                    'http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv'
                );
        }

        throw new \LogicException('Cannot find repository for ' . $divergence);
    }
}