<?php

namespace AppBundle\Entity;

use AppBundle\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $paid_amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $card_cvc;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $card_expiry_month;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $card_expiry_year;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $payment_status;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $card_holder_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment_reference;

    /**
     * @ORM\ManyToOne(targetEntity=BookOrder::class, inversedBy="payments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $order_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaidAmount(): ?string
    {
        return $this->paid_amount;
    }

    public function setPaidAmount(string $paid_amount): self
    {
        $this->paid_amount = $paid_amount;

        return $this;
    }

    public function getCardCvc(): ?int
    {
        return $this->card_cvc;
    }

    public function setCardCvc(int $card_cvc): self
    {
        $this->card_cvc = $card_cvc;

        return $this;
    }

    public function getCardExpiryMonth(): ?string
    {
        return $this->card_expiry_month;
    }

    public function setCardExpiryMonth(string $card_expiry_month): self
    {
        $this->card_expiry_month = $card_expiry_month;

        return $this;
    }

    public function getCardExpiryYear(): ?string
    {
        return $this->card_expiry_year;
    }

    public function setCardExpiryYear(string $card_expiry_year): self
    {
        $this->card_expiry_year = $card_expiry_year;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(string $payment_status): self
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    public function getCardHolderNumber(): ?string
    {
        return $this->card_holder_number;
    }

    public function setCardHolderNumber(string $card_holder_number): self
    {
        $this->card_holder_number = $card_holder_number;

        return $this;
    }

    public function getPaymentReference(): ?string
    {
        return $this->payment_reference;
    }

    public function setPaymentReference(?string $payment_reference): self
    {
        $this->payment_reference = $payment_reference;

        return $this;
    }

    public function getOrderId(): ?BookOrder
    {
        return $this->order_id;
    }

    public function setOrderId(?BookOrder $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }
}
