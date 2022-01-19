<?php

namespace Framework\Routes;


class Route {

    private $routeName;

    private $function;

    private $parameters;

    public function __construct(string $routeName, ?callable $function, array $parameters)
    {
        $this->routeName = $routeName;
        $this->function = $function;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->routeName;
    }

    /**
     * @return string
     */
    public function getCallback(): callable
    {
        return $this->function;
    }

    /**
     * Get The URL parameters
     * @return array
     */
    public function getParameters(): array
    {
       return $this->parameters;
    }

}