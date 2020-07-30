<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Guess the number</title>
    </head>
    <body>
        Guess a number between 1 and 100.
        <?php
            $num = rand(1,100);
            if (isset($_POST["prevValue"])) {
                $num=$_POST["prevValue"];
            }
            $correct = false;
            if(isset($_POST["guess"])) {
                $correct = $_POST["guess"] == $num;
                if ($correct) {
                    $num = rand(1,100);
                }
            } 
        ?>
        <form action="index.php" method="POST">
            <input type="number" name="guess" min="1" max="100">
            <input type="hidden" name="prevValue" value="<?php echo $num; ?>" />
            <input type="submit">
        </form>
        <?php
            if(isset($_POST["guess"])) {
                // id index exists
                if ($correct) {
                    echo "Bingo";
                } else if ($_POST["guess"] < $num) {
                    echo "Higher";
                } else  {
                    echo "Lower";
                }
                echo('<br>Previous guess: ');
                echo($_POST["guess"]);
            }
        ?>
    </body>
</html>