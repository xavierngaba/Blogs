<?php
/**
 * Created by PhpStorm.
 * User: xavier_ng
 * Date: 02/09/2016
 * Time: 03:46
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;

class CandidatureRepository extends EntityRepository
{
    public function findnombreCandidatureAttente()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c WHERE c.etat=\'En Attente\''
        )->getSingleScalarResult();
    }

    public function findnombreCandidatureRefus()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c WHERE c.etat=\'Refus\''
        )->getSingleScalarResult();
    }

    public function findnombreCandidatureEntretient()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c WHERE c.etat=\'Entretient\''
        )->getSingleScalarResult();
    }

    public function findnombreCandidaturePR()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c WHERE c.etat=\'Pas de reponse\''
        )->getSingleScalarResult();
    }

    public function findnombreCandidatureConfirme()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c WHERE c.etat=\'Confirme\''
        )->getSingleScalarResult();
    }

    public function findnombreTotalOffre()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT count(c.id) FROM AppBundle:Candidature c'
        )->getSingleScalarResult();
    }
}