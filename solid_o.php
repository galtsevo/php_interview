<?php

class SomeObject {
    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

class SomeObjectsHandler {
    public function __construct() { }

    public function handleObjects($objects) {
        $handlers = [];
        foreach ($objects as $object) {
            if ($object instanceof SomeObject)
                $handlers[] = 'handle_'. $object->getObjectName();
        }
        var_dump($handlers);
        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2'),
    new SomeObject('object_3'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);