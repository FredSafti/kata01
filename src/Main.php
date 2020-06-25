<?php

namespace App;

use App\Enum\Divergence;
use App\Repository\RemoteCSVRepository;
use App\Repository\LocalCSVRepository;
use App\Repository\RepositoryInterface;

class Main
{
    /** @var string */
    protected $divergence;
    /**
     * @var RepositoryInterface
     */
    private $repository;

    public function __construct($divergence)
    {
        $this->divergence = $divergence;
        if ($divergence === Divergence::MEGAGENCE) {
            $this->repository = new RemoteCSVRepository($this->divergence);
        } else {
            $this->repository = new LocalCSVRepository($this->divergence);
        }
    }

    /** @return string */
    public function getDivergence()
    {
        return $this->divergence;
    }

    /** @return Iterable */
    public function getListeBiens()
    {
        return $this->repository->findAll();
    }
}
