<?php

namespace App\Repository;

use App\Entity\Setting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Setting>
 *
 * @method DeviceTypeSetting|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeviceTypeSetting|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeviceTypeSetting[]    findAll()
 * @method DeviceTypeSetting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Setting::class);
    }
}
