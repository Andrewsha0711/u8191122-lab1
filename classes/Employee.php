<?php

namespace App;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employee{
    private $id;
    private $name;
    private $salary;
    private $date;

    public function __construct(string $id, string $name, float $salary, DateTime $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->date = $date;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function __getWorkExpirience()
    {
        return date_diff(new DateTime('now'),$this->date)->y;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        //$metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraints("name", [
            new Assert\NotBlank(),
            new Assert\Regex([
                'pattern' => '/^[a-z]+$/i',
                'message' => 'Name should only contain letters'
            ]),
            new Assert\Length(['max' => 20])
            ]);

        $metadata->addPropertyConstraints("salary", [
            new Assert\NotBlank(),
            new Assert\Positive
        ]);

        $metadata->addPropertyConstraints("id", [
            new Assert\NotBlank(),
            new Assert\Positive
        ]);
        
        $metadata->addPropertyConstraints("date", [
            new Assert\NotBlank()
        ]);
        
    }
}