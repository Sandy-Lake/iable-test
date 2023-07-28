<?php
namespace Interfaces;

interface ModelInterface
{
    public function all();

    public function create(object $data);

    public function find(int $id);

    public function update(object $data);

    public function delete(int $id);
}
