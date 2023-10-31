<?php
include_once ("data_scrambler_fun.php");
$task = 'encode';
if (isset($_GET['task']) && $_GET['task']!='') {//Chacking task value
    $task = $_GET['task'];
}

$key = 'abcdefghijklmnopurstuvwxyz1234567890';
$orginal_key = 'abcdefghijklmnopurstuvwxyz1234567890';


if ('key'== $task) {//TO split the key and then shuffle it to make a unique key
    $key_orginal = str_split($key);
    shuffle($key_orginal);
    $key = join('', $key_orginal);
} else if (isset($_POST['key']) && $_POST['key']!='') {
    $key = $_POST['key'];
}

$scrambledata = '';
if ('encode' == $task) {// To encode the massage
    $data = $_POST['input']??'';
    if ($data != '') {
        $scrambledata = scrambling($data, $key);
    }
}

if ('decode' == $task) {//To decode the massage
    $data = $_POST['input']??'';
    if ($data != '') {
        $scrambledata = decodeData($data, $key);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Scrambler</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="colume colume-60 colume-offset-20">
                <h1>Data Scrambling</h1>
                <p>Use this Web Application to Encode & decode.</p>
                <p>
                    <a href="/data_scrambler.php?task=encode">Encode</a> |<!---Value pass as encode on task --->
                    <a href="/data_scrambler.php?task=decode">Decode</a> |<!---Value pass as decode on task --->
                    <a href="/data_scrambler.php?task=key">Generate</a><!---Value pass as key on task --->
                </p>
            </div>
        </div>
        <div class="row">
            <div class="colume colume-60 colume-offset-20">
                <form method="POST"  action ="data_scrambler.php<?php if('decode' == $task) {echo "?task=decode";} ?>"><!---IF URL value task=decode from line  Decode hyper link tag then decode functation will work--->
                    <label for="key">Key</label>
                    <input type="text" name="key" id="key" <?php displaykey($key); ?>>
                    <label for="input">Input</label>
                    <textarea name="input" id="input"><?php if (isset($_POST['input'])) { echo $_POST['input']; }?></textarea>
                    <label for="output">Output</label>
                    <textarea name="output" id="output" cols="30" rows="10"><?php echo $scrambledata; ?></textarea>
                    <button type="submit">Generate</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <p>© 2023 Md. Nafiz Imam Zilani</p>
                <ul class="social-icons">
                <li>
                    <a href="https://www.linkedin.com/in/nafiz-zilani/"><i class="fa fa-linkedin">LinkedIn</i></a>
                </li>
                <li>
                    <a href="https://github.com/Nafiz-Zilani"><i class="fa fa-github">Github</i></a>
                </li>
                </ul>
            </div>
            </div>
        </div>
    </footer>
</body>
</html>