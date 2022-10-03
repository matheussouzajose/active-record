<?php

namespace MatheusSouzaJose\ActiveRecordORM\Drivers;

use MatheusSouzaJose\ActiveRecordORM\QueryBuilder\IQueryBuilder;

interface IDriver
{
    /**
     * @param array $config
     * @return mixed
     */
    public function connect(array $config);

    /**
     * @return mixed
     */
    public function close();

    /**
     * @param IQueryBuilder $queryBuilder
     * @return mixed
     */
    public function setQueryBuilder(IQueryBuilder $queryBuilder);

    /**
     * @return mixed
     */
    public function execute();

    /**
     * @return mixed
     */
    public function lastInsertedId();

    /**
     * @return mixed
     */
    public function first();

    /**
     * @return mixed
     */
    public function all();
}
