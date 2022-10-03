<?php

namespace MatheusSouzaJose\ActiveRecordORM\Drivers;

class MySql implements IDriver
{
    /** @var string */
    protected string $dsn_pattern = 'mysql:host=%s;dbname=%s';

    use PDOTrait;
}
