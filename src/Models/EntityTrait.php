<?php

namespace MatheusSouzaJose\ActiveRecordORM\Models;

trait EntityTrait
{
    /** @var array */
    protected array $data;

    /** @var string */
    protected string $table;

    /**
     * @param array $data
     */
    public function setAll(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->data;
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $method = $this->methodName('set', $name);
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = $this->methodName('get', $name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return $this->data[$name] ?? null;
    }

    /**
     * @param $prefix
     * @param $name
     * @return string
     */
    private function methodName($prefix, $name): string
    {
        $method = str_replace('_', ' ', $name);
        $method = ucwords($method);
        $method = str_replace(' ', '', $method);

        return $prefix . $method;
    }
}
