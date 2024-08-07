<?php

namespace App\Entity;

use DateTime;

class Task
{
    private string $name;
    private DateTime $createdAt;

    public function __construct(string $name, DateTime $createdAt)
    {
        $this->name = $name;
        $this->createdAt = $createdAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}
