<?php   
namespace App\Config\Core;
abstract class AbstractRepository
{

    abstract public function selectAll(): array;

    abstract public function insert(): bool;

    abstract public function update(): bool;

    abstract public function delete(): bool;
    abstract public function selectById(int $id): array;
    abstract public function selectByEmail(string $email): array;
    abstract public function selectBy(array $filtre): array;

}