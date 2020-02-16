<?php

declare(strict_types=1);

namespace Mautic\LeadBundle\Event;

use Mautic\LeadBundle\Entity\DoNotContact as DNC;
use Symfony\Component\EventDispatcher\Event;

class DoNotContactAddEvent extends Event
{
    public const ADD_DONOT_CONTACT = 'mautic.lead.add_donot_contact';

    private $lead;

    private $channel;

    private $comments;

    private $reason;

    private $persist;

    private $checkCurrentStatus;

    private $override;

    public function __construct($lead, $channel, $comments = '', $reason = DNC::BOUNCED, $persist = true, $checkCurrentStatus = true, $override = true)
    {
        $this->lead               = $lead;
        $this->channel            = $channel;
        $this->comments           = $comments;
        $this->reason             = $reason;
        $this->persist            = $persist;
        $this->checkCurrentStatus = $checkCurrentStatus;
        $this->override           = $override;
    }

    /**
     * @return mixed
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function getReason(): int
    {
        return $this->reason;
    }

    public function isPersist(): bool
    {
        return $this->persist;
    }

    public function isCheckCurrentStatus(): bool
    {
        return $this->checkCurrentStatus;
    }

    public function isOverride(): bool
    {
        return $this->override;
    }
}
