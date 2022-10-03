<?php

namespace MatheusSouzaJose\ActiveRecordORM\Models;

use MatheusSouzaJose\ActiveRecordORM\Drivers\IDriver;
use MatheusSouzaJose\ActiveRecordORM\QueryBuilder\Select;

trait RepositoryTrait
{
    /** @var IDriver */
    protected IDriver $driver;

    /** @var */
    protected $entity;

    /**
     * @param IDriver $driver
     */
    public function __construct(IDriver $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        if (!empty($this->table)) {
            return $this->table;
        }

        $table = get_class($this);
        $table = explode('\\', $table);
        $table = array_pop($table);

        return strtolower($table);
    }

    /**
     * @param null $id
     * @return null
     */
    public function first($id = null)
    {
        $conditions = [];

        if (!is_null($id)) {
            $conditions[] = ['id', $id];
        }

        $data = $this->driver->setQueryBuilder(new Select($this->getTable(), $conditions))
            ->execute()
            ->first();

        if (!$data) {
            return null;
        }

        $this->setAll($data);
    }
}
