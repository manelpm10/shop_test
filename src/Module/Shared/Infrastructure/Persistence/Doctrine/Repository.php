<?php

namespace Module\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class Repository.
 */
abstract class Repository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $repository;

    protected $isTransactionOpen = false;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->setRepository();
    }

    private function setRepository(): void
    {
        $this->repository = $this->entityManager->getRepository($this->getRepositoryName());
    }

    protected function entityManager(): EntityManager
    {
        return $this->entityManager;
    }

    protected function persist($entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    protected function remove($entity): void
    {
        $entity = $this->entityManager()->merge($entity);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    public function beginTransaction(): void
    {
        $this->entityManager->beginTransaction();
        $this->isTransactionOpen = true;
    }

    public function commit(): void
    {
        if ($this->isTransactionOpen)
        {
            $this->entityManager->commit();
            $this->isTransactionOpen = false;
        }
    }

    protected function queryBuilder(): QueryBuilder
    {
        return $this->entityManager->createQueryBuilder();
    }

    abstract protected function getRepositoryName(): string;
}
