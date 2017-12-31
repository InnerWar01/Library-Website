<?php

namespace my_project\GestionLivresBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    /**
     * @return Book[]
     */
    public function listBooksOrderedByPrice()
    {
        return $this->createQueryBuilder('book')
            ->orderBy('book.isbn', 'ASC')
            ->getQuery()
            ->execute();
    }
}