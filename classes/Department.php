<?php

namespace App;

class Department{
    private string $name;
    private array $staff;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->staff = [];
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getStaff(): array
    {
        return $this->staff;
    }

    public function setName(string $value)
    {
        $this->name = $value;
    }

    public function setStaff(array $value)
    {
        $this->staff = $value;
    }

    public function addEmployee(Employee $employee)
    {
        $this->staff[] = $employee;
    }

    public function salarySum(): float
    {
        $salarySum = 0;
         foreach ($this->staff as $employee) {
           $salarySum = $salarySum + $employee->getSalary();
        }    
        return $salarySum;     
    }
}