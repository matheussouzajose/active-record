<?php

namespace MatheusSouzaJose\ActiveRecordORM\QueryBuilder;

interface IQueryBuilder
{
    /**
     * @return array
     */
    public function getValues(): array;

    /**
     * @return mixed
     */
    public function __toString();
}
