<?php
    if(isset($_POST["process"])){
        $result = [
        "operation" => $_POST["operation"],
        "text" => $_POST["inputText"], 
        //additionals
        "target" => $_POST["substring"],//find (strpos)
        "lengthSubstr" => intval($_POST["length"]),
        "startSubstr" => intval($_POST["start"])
        //additionals
        ];
        $processed = Transform::regular($result);
    }
    class Transform{
        public static function reverseString(string $text){
            $reversed = "";
            for($i = strlen($text)-1; $i >= 0 ; $i--){
                $reversed.= $text[$i];
            }
            return $reversed;
        }
        public static function regular(array $inputs): string | array{
            $text = $inputs["text"];
            $result = "";
            $result = match ($inputs["operation"]) { //$ops_text["operation"]
                "uppercase" => strtoupper($text),
                "lowercase" => strtolower($text),
                "reverse" => Transform::reverseString($text),
                "charCount" => strlen($text),
                "wordCount" => str_word_count($text),
                "wordWrap" => wordwrap($text, 10, '<br>'),
                "explode" => implode(",",explode(' ', $text)),
                "shuffle" => str_shuffle($text),
                "removeSpaces" => str_replace(" ", "", $text),
                "findPosition" => strpos($text, $inputs["target"]),
                "substr" => substr($text, $inputs["startSubstr"], $inputs["lengthSubstr"])
            };
            return $result;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Transformation Result</title>
    <link rel="stylesheet" href="./Assets/CSS/style.css">
</head>
<body>
    <div class="container">
        <h1>Text Transformation Result</h1>

        <p>Original Text: <?php 
        if(isset($result)){
            echo $result["text"];
        }
        ?>
        </p>
        <p>Result: <?php 
        if(isset($processed)){
            echo $processed;
        }
        ?>
        </p>
        <p><a href="index.php">Back to Text Transformation Tool</a></p>
    </div>
</body>
</html>
