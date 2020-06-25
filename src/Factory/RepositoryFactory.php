<?php


namespace App\Factory;


class RepositoryFactory
{
    public function getRepo($divergence)
    {
        $className = 'App\Repository\\' . ucfirst($divergence) . 'Repository';

        if (!class_exists($className)) {
            throw new \InvalidArgumentException($divergence . ' does not exists');
        }

        return new $className();
    }
}