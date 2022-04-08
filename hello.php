<?php
include "vendor/autoload.php";
include "classes/Controller.php";

use App\Department;
use App\Employee;

use function App\getEmployersExpirience;
use function App\getMinMaxTotalSalaryDepartments;
use function App\validateEmployers;

$emps = [];
$emps[] = new Employee(1, "employeeA", 100000, new DateTime("07.11.2000"));
$emps[] = new Employee(0.1, "emplB", 100000, new DateTime("07.11.2000"));
$emps[] = new Employee(-1, "emplC", 100000, new DateTime("07.11.2000"));
$emps[] = new Employee(2, "emplD", 0, new DateTime("07.11.2000"));
$emps[] = new Employee("1", "emplE", 100000, new DateTime("07.11.2000"));
$emps[] = new Employee(3, "emplF", "100000", new DateTime("07.11.2000"));

$dep = [];
$dep[] = new Department("first");
$dep[] = new Department("second");
$dep[] = new Department("dep");

for($i = 0; $i < 10; $i++)
{
    $dep[0]->addEmployee(new Employee($i, "Employee", 25000.50, new DateTime("07.11.2000")));
    $dep[1]->addEmployee(new Employee($i, "Employee", 25000.50, new DateTime("07.11.2000")));
}

$dep[2]->addEmployee(new Employee($i, "Employee", 50000, new DateTime("07.11.2000")));
$dep[2]->addEmployee(new Employee($i, "Employee", 30000.5, new DateTime("07.11.2000")));

validateEmployers($emps);
getEmployersExpirience($emps);
$result = getMinMaxTotalSalaryDepartments($dep);
echo $result;
