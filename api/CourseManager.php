<?php

namespace Api;

use Models\Course;
use Config\Database;

class CourseManager
{
    public function __construct(
        public readonly \Database $database,
        public readonly \Course $course
    ) {
        $this->course = new Course($this->database->getConnection());
    }

    public function all(): bool|\PDOStatement
    {
        return $this->course->all();
    }

    public function find(int $id): array
    {
        return $this->course->find($id);
    }

    public function create(): array
    {
        $data = json_decode(file_get_contents("php://input"));

        return $this->course->create($data);
    }

    public function update(): bool
    {
        $data = json_decode(file_get_contents("php://input"));

        return $this->course->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->course->delete($id);
    }
}