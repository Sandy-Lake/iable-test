<?php

namespace Models;

use \Models\Model;

class Course extends Model
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $instructor = null;
    public ?string $description = null;
    public ?string $credits = null;

    public function fill($result)
    {
        if (isset($result['id'])) {
            $this->id .= $result['id'];
        }
        if (isset($result['name'])) {
            $this->name .= $result['name'];
        }
        if (isset($result['instructor'])) {
            $this->instructor .= $result['instructor'];
        }
        if (isset($result['description'])) {
            $this->description .= $result['description'];
        }
        if (isset($result['credits'])) {
            $this->credits .= $result['credits'];
        }
    }
}