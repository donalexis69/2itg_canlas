<?php

if(isset($_POST['salary']) && isset($_POST['nature'])) {
  $salary = $_POST['salary'];
  $nature = $_POST['nature'];

  if($nature == "bi-monthly") {
    $salary = $salary * 2;
  }

  $annual_salary = $salary * 12;

  if($annual_salary <= 250000) {
    $tax = 0;
  } elseif($annual_salary <= 400000) {
    $tax = ($annual_salary - 250000) * 0.2;
  } elseif($annual_salary <= 800000) {
    $tax = 30000 + ($annual_salary - 400000) * 0.25;
  } elseif($annual_salary <= 2000000) {
    $tax = 130000 + ($annual_salary - 800000) * 0.3;
  } elseif($annual_salary <= 8000000) {
    $tax = 490000 + ($annual_salary - 2000000) * 0.32;
  } else {
    $tax = 2410000 + ($annual_salary - 8000000) * 0.35;
  }

  $monthly_tax = $tax / 12;
}

?>

<html>
  <head>
    <title>TAX CALCULATOR</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>TAX CALCULATOR</h1>
      <form action="calculate.php" method="post">
        <label for="salary">Monthly Salary (PHP):</label>
        <input type="text" id="salary" name="salary">
        <br><br>
        <label for="nature">Nature of Salary:</label>
        <select id="nature" name="nature">
          <option value="monthly">Monthly</option>
          <option value="bi-monthly">Bi-Monthly</option>
        </select>
        <br><br>
        <input type="submit" value="Calculate">
      </form>
      <br><br>
      <?php if(isset($annual_salary)): ?>
        <h2>Results</h2>
        <p>Annual Salary (PHP): <?php echo number_format($annual_salary, 2); ?></p>
        <p>Estimated Annual Tax (PHP): <?php echo number_format($tax, 2); ?></p>
        <p>Estimated Monthly Tax (PHP): <?php echo number_format($monthly_tax, 2); ?></p>
      <?php endif; ?>
    </div>
  </body>
</html>
