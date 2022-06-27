<?php 

$array = [
    " " => "1",
    "A" => "2",
    "B" => "22", 
    "C" => "222", 
    "D" => "3",
    "E" => "33", 
    "F" => "333",
    "G" => "4",
    "H" => "44",
    "I" => "444",
    "J" => "5",
    "K" => "55", 
    "L" => "555",
    "M" => "6", 
    "N" => "66",
    "O" => "666", 
    "P" => "7",
    "Q" => "77",
    "R" => "777",
    "S" => "7777",
    "T" => "8",
    "U" => "88", 
    "V" => "888", 
    "W" => "9",
    "X" => "99", 
    "Y" => "999", 
    "Z" => "9999"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (strlen($_POST['convertChar']) === 0) {
        $_SESSION['errorMessage'] = "podaj proszę dane do konwersji";
    }
    $str = strtoupper($_POST['convertChar']);
    $str = trim($str);
    $str = strip_tags($str);
    $stplitted = str_split($str);
    $char = '';
        for ($i=0; $i<count($stplitted); $i++) { 
            if (array_key_exists($stplitted[$i], $array))  {
                $char .= $array[$stplitted[$i]];
            }  
        }
    $_SESSION['valid'] = $char;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>kodefix zadanie</title>
</head>
<body>
    
    <div class="phone--container">
        <div class="phone--display">
            <form class="phone--characters" action="/" method="POST" id="characters">
                <input id="input" type="text" name="convertChar" value="<?php echo isset($_SESSION['valid']) ? htmlentities($_SESSION['valid']) : "" ?>" placeholder="wpisz tekst, aby otrzymać kombinację cyfr"/>
            </form>
        </div>
        <div class="errorMessage">
            <?php echo isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : "" ?>
        </div>
        <div class="phone--keyboard">
            <div class="phone--button">
                <div>
                    <div class="phone--button--number">1</div>
                 </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">2</div>
                    <div class="phone--button--characters">abc</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">3</div>
                    <div class="phone--button--characters">def</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">4</div>
                    <div class="phone--button--characters">ghi</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">5</div>
                    <div class="phone--button--characters">jkl</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">6</div>
                    <div class="phone--button--characters">mno</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">7</div>
                    <div class="phone--button--characters">pqrs</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">8</div>
                    <div class="phone--button--characters">tuv</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">9</div>
                    <div class="phone--button--characters">wxyz</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">*</div>
                 </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">0</div>
                    <div class="phone--button--characters">+</div>
                </div>
            </div>

            <div class="phone--button">
                <div>
                    <div class="phone--button--number">#</div>
                 </div>
            </div>

        </div>
        <div class="phone--button--submit">
                <button type="submit" form="characters">kliknij, by zobaczyć cyfry</button>
        </div>
    </div>

<script>
    document.getElementById("input").addEventListener("keypress", (e) => {
        const keyCode = (e.keyCode ? e.keyCode : e.which);
            if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }});

    document.getElementById("input").addEventListener("keypress", event => {
        const regex = new RegExp("^[a-zA-Z0-9 ]+$");
        const key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
     }
    });
</script>
</body>
</html>
 