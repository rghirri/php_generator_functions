<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = 'file.txt';

/************** This works Generator ****************** */
function getLines($file)
{
  $fp = fopen($file, 'r');

  while (!feof($fp)) {
    $line = fgets($fp);
    yield $line;
  }
  fclose($fp);
}

function birthdayMatch($line)
{
  $pattern = "/06-25/i";
  if (preg_match_all($pattern, $line)){
    echo "It's working" . $line;
  }
}


$lineGenerator = getLines($file);
foreach ($lineGenerator as $line) {
  birthdayMatch($line);
}

/************** This works Iterator ****************** */
// $fileInfo = new SplFileInfo($file);
// $fileObject = $fileInfo->openFile('r');

// foreach ($fileObject as $line) {
//   processLine($line);
// }

// function processLine($line)
// {
//   $pattern = "/06-25/i";
//   if (preg_match_all($pattern, $line)){
//     echo "It's working" . $line;
//   }
// }


// function getlines($file)
// {
//   return file($file);
// }

// function processData($lines)
// {
//   foreach ($lines as $line){
//     processLine($line);
//   }
// }

// function processLine($line)
// {
//   if ($line == 'Alex,1975-07-19'){
//     echo "It's working" . $line;
//     exit();
//   }else
//   {
//     echo "It's Not working". $line;
//   }
// }

// $line = getLines('file.txt');
// processData($line);