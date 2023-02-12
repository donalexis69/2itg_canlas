<?php

if (isset($_POST['submit'])) {
  $salary = $_POST['salary'];
  $frequency = $_POST['frequency'];

  if ($frequency == 'monthly') {
    $annual_salary = $salary * 12;
  } else {
    $annual_salary = $salary * 6;
  }

  if ($annual_salary <= 250000) {
    $tax = 0;
  } elseif ($annual_salary <= 400000) {
    $tax = ($annual_salary - 250000) * 0.2;
  } elseif ($annual_salary <= 800000) {
    $tax = 30000 + ($annual_salary - 400000) * 0.25;
  } elseif ($annual_salary <= 2000000) {
    $tax = 130000 + ($annual_salary - 800000) * 0.3;
  } elseif ($annual_salary <= 8000000) {
    $tax = 490000 + ($annual_salary - 2000000) * 0.32;
  } else {
    $tax = 2410000 + ($annual_salary - 8000000) * 0.35;
  }

  $monthly_tax = $tax / 12;
}

if (isset($_POST['salary']) && isset($_POST['frequency'])) {
?>
  <div class="results">
    <h2>Results</h2>
    <p>Annual Salary: PHP <?php echo $annual_salary; ?></p>
    <p>Estimated Annual Tax: PHP <?php echo $tax; ?></p>
    <p>Estimated Monthly Tax: PHP <?php echo $monthly_tax; ?></p>
  </div>
<?php
}

?>
