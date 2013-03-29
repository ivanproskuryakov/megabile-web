<?php

namespace Magazento\SettingsBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * IphoneTranslationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class IphoneTranslationRepository extends DocumentRepository
{
    
    public function removeByUserId($userId) {
        return $this->createQueryBuilder()
                        ->remove()
                        ->field('user_id')->equals($userId)
                        ->getQuery()
                        ->execute();
    }
    
}