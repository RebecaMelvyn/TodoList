<?php

class Todo
{

    public ?DateTime $completed_at = null; // ? devant DateTime pour dire que c'est sois DateTime sois null

    function __construct(
        string $title,
        string $description
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    public function setCompleted(): self
    {
        $this->completed_at = new DateTime();
        return $this;
    }


    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }
}
