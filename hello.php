<?php
include "vendor/autoload.php";

use App\Controller;
use App\Department;
use App\Employee;
use \Symfony\Component\Validator\ValidatorBuilder;
$emps = [];
$emps[] = new Employee(1, "CorrectEmployee", 100, new DateTime("02.04.2002"));
$emps[] = new Employee(2, "Wrong.Name", 200, new DateTime("05.05.2005"));
$emps[] = new Employee(-5, "WrongId", 300, new DateTime("03.03.2003"));
$emps[] = new Employee(4, "WrongSalary", 0, new DateTime("07.07.2017"));
$smps[] = new Employee(5, "FifthName", 400, new DateTime("01.01.2001"));
$emps[] = new Employee("6", "SixthName", 200, new DateTime("11.11.2011"));
$emps[] = new Employee(5, "7thName", "100", new DateTime("07.07.2020"));

$dep = [];
$dep[] = new Department("first");
$dep[] = new Department("second");

for($i = 0; $i < 10; $i++)
{
    $dep[0]->addEmployee(new Employee($i, "Employee", 25000.50, new DateTime("07.11.2000")));
    $dep[1]->addEmployee(new Employee($i, "Employee", 25000.50, new DateTime("07.11.2000")));
}

$result = (new Controller())->getMinMaxTotalSalaryDepartments($dep);
echo $result;

$validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();
$violations = $validator->validate($emps);

if (0 !== count($violations)) {
    // there are errors, now you can show them
    foreach ($violations as $violation) {
        //echo $violation->getMessage().'<br>';
        echo $violation.'<br>';
    }
}
