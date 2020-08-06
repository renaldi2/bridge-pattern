<?php
class Abstraction
{

    protected $implementation;

    public function __construct(Implementation $implementation)
    {
        $this->implementation = $implementation;
    }

    public function operation(): string
    {
        return "Bahan Baku Yang Mudah Basi:\n" .
            $this->implementation->operationImplementation();
    }
}


class ExtendedAbstraction extends Abstraction
{
    public function operation(): string
    {
        return "Bahan Baku Yang Tidak Mudah Basi:\n" .
            $this->implementation->operationImplementation();
    }
}


interface Implementation
{
    public function operationImplementation(): string;
}

class ConcreteImplementationA implements Implementation
{
    public function operationImplementation(): string
    {
        return "tomat, sawi, mentimun, cabai<br>\n";
    }
}

class ConcreteImplementationB implements Implementation
{
    public function operationImplementation(): string
    {
        return "Beras, minyak, merica, terigu\n";
    }
}


function clientCode(Abstraction $abstraction)
{
    // ...

    echo $abstraction->operation();

    // ...
}

$implementation = new ConcreteImplementationA;
$abstraction = new Abstraction($implementation);
clientCode($abstraction);

echo "\n";

$implementation = new ConcreteImplementationB;
$abstraction = new ExtendedAbstraction($implementation);
clientCode($abstraction);