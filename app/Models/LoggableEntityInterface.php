<?php

namespace App\Models;


interface LoggableEntityInterface
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const DELETED = 'deleted';

    public function getEntityID(): int;

    public function getEntityName(): string;
}
