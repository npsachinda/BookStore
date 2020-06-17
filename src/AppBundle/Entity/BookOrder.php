<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class BookOrder
{
   /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
    * @ORM\Column(type="decimal", precision=8, scale=2)
    */
    private $total_amount;

    /**
    * @ORM\Column(type="decimal", precision=7, scale=2)
    */
    private $discount_amount;

    /**
    * @ORM\Column(type="decimal", precision=8, scale=2)
    */
    private $net_amount;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Coupon::class)
     */
    private $coupon;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="order_id")
     */
    private $payments;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCoupon(): ?Coupon
    {
        return $this->coupon;
    }

    public function setCoupon(?Coupon $coupon): self
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setOrderId($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getOrderId() === $this) {
                $payment->setOrderId(null);
            }
        }

        return $this;
    }
}

