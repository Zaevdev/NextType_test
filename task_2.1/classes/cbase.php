<?php

declare(strict_types=1);

set_exception_handler(static function ($exception) {
    echo "Exception: " . $exception->getMessage();
});

class CBase
{
    private static ?array $params = null;
    private static ?CBase $instance = null;

    public function __construct($params)
    {
        if (is_array($params)) {
            self::$params = $params;
        }
    }

    public static function getInstance(array $array): CBase
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($array);
        }

        return self::$instance;
    }

    /**
     * @throws Exception
     */
    public static function getParam($property)
    {
        if (!is_null(self::$params) && isset(self::$params[$property])) {
            return self::$params[$property];
        }

        throw new RuntimeException('Oops, there is no such property!');
    }

}
