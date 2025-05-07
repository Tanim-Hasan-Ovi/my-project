<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h2>PHP Calculator</h2>
        <form method="post">
            <label for="num1">First Number:</label>
            <input type="number" id="num1" name="num1" required step="any">
            
            <label for="num2">Second Number:</label>
            <input type="number" id="num2" name="num2" required step="any">
            
            <div class="buttons">
                <button type="submit" name="operation" value="add">Addition (Sum)</button>
                <button type="submit" name="operation" value="sub">Subtraction (Sub)</button>
                <button type="submit" name="operation" value="mul">Multiplication (Mul)</button>
                <button type="submit" name="operation" value="div">Division (Div)</button>
            </div>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];
            $result = 0;
            
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    $op_symbol = "+";
                    break;
                case "sub":
                    $result = $num1 - $num2;
                    $op_symbol = "-";
                    break;
                case "mul":
                    $result = $num1 * $num2;
                    $op_symbol = "×";
                    break;
                case "div":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        $op_symbol = "÷";
                    } else {
                        $result = "Error: Division by zero!";
                    }
                    break;
                default:
                    $result = "Invalid operation";
            }
            
            echo '<div class="result">';
            if (is_numeric($result)) {
                echo "Result: $num1 $op_symbol $num2 = $result";
            } else {
                echo $result;
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>