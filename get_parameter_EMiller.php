<?php
    // get data from url/form
    $first = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_STRING);
    $last = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_STRING);
    $years = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);

    //validate name and age provided
    if (empty($first) || empty($last)) {
        echo "<span class='error'>" . "Missing first or last name. Please provide your full name." . "</span>";
    } else if (empty($years)) {
        echo "<span class='error'>" . "Missing the numeric age parameter." . "</span>";
    } 

    //calculate days old based on year (not birthdate)
    $days_old = ($years * 365) + (intdiv($years, 4)); #intdiv calculates leap years to add

    //date
    $date = date('m/d/y');
?>
<!DOCTYPE html>
<html>
<head>
    <title>GET Parameter Assignment :: Elizabeth Miller</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>

        <h1>Hello, my name is <?php echo htmlspecialchars($first) . ' ' . htmlspecialchars($last); ?>.</h1>
        <br>

        <h4>I am <?php echo htmlspecialchars($years); ?> years old, and I am
        <?php if ($years >= 18){
            echo 'old enough to vote in the United States.';
        } else {echo 'not old enough to vote in the United States.';}
        ?>
        <br><br>
        I'm at least <?php echo htmlspecialchars($days_old); ?> days old.</h4>

        <br>
        <h6>Today's date is <?php echo htmlspecialchars($date) ?>. </h6>
    </main>
</body>
</html>
