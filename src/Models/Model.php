<?php

namespace Models;

abstract class Model
{
    abstract public function fill($row);

    public static function all(): array
    {
        $namespaceClass1 = static::class;
        $nameClass = static::getModelClass();
        $table = new Table($nameClass);
        $result = $table->all();
        $models = [];
        foreach ($result as $row) {
            $model = new $namespaceClass1;
            $model->fill($row);
            $models[] = $model;
        }
        return $models;
    }

    public static function find($id): array
    {
        $namespaceClass1 = static::class;
        $nameClass = static::getModelClass();
        $table = new Table($nameClass);
        $result = $table->find($id);
        $models = [];
        foreach ($result as $row) {
            $model = new $namespaceClass1;
            $model->fill($row);
            $models[] = $model;
        }
        return $models;
    }

    public static function create($fields): array
    {
        $namespaceClass1 = static::class;
        $nameClass = static::getModelClass();
        $table = new Table($nameClass);
        $result = $table->insert($fields);
        $models = [];
        foreach ($result as $row) {
            $model = new $namespaceClass1;
            $model->fill($row);
            $models[] = $model;
        }
        return $models;
    }

    public static function update($fields): bool
    {
        $nameClass = static::getModelClass();
        $table = new Table($nameClass);
        return $table->update($fields);
    }

    public static function delete($fields): bool
    {
        $nameClass = static::getModelClass();
        $table = new Table($nameClass);
        return $table->delete($fields);
    }

    private static function getModelClass(): string
    {
        $namespaceClass1 = static::class;
        $namespaceClass2 = explode('\\', $namespaceClass1);
        $class = array_pop($namespaceClass2);
        return lcfirst($class) . 's';
    }
}