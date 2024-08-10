<?php

namespace Modules\Common\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

abstract class BaseFactory extends Factory
{
    /**
     * Dynamic attributes state generator for factories.
     *
     * @example Factory::count(10)
     *                  ->nameAttribute(faker()->name)
     *                  ->create();
     *
     * @param $method
     * @param $parameters
     * @return mixed|self
     */
    public function __call($method, $parameters)
    {
        try {
            return parent::__call($method, $parameters);
        } catch (\BadMethodCallException $exception) {
            if (! Str::endsWith($method, 'Attribute')) {
                static::throwBadMethodCallException($method);
            }

            if (! isset($parameters[0])) {
                throw new \InvalidArgumentException('Model attribute value not handed.');
            }

            $modelAttribute = Str::snake(Str::replace('Attribute', '', $method));

            return $this->handleModelProperty($modelAttribute, $parameters);
        }
    }

    private function handleModelProperty($modelAttribute, $attributeValue): self
    {
        return $this->state(function () use ($modelAttribute, $attributeValue) {
            return [$modelAttribute => $attributeValue[0]];
        });
    }
}
