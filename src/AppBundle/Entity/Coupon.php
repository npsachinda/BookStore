<?php

namespace AppBundle\Entity;

use AppBundle\Repository\CouponRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="coupon")
 */
class Coupon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $issued_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expired_date;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIssuedDate(): ?\DateTimeInterface
    {
        return $this->issued_date;
    }

    public function setIssuedDate(\DateTimeInterface $issued_date): self
    {
        $this->issued_date = $issued_date;

        return $this;
    }

    public function getExpiredDate(): ?\DateTimeInterface
    {
        return $this->expired_date;
    }

    public function setExpiredDate(\DateTimeInterface $expired_date): self
    {
        $this->expired_date = $expired_date;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
