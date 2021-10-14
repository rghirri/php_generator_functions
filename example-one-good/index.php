<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = 'file.txt';
function getEmployeeData($file)
{
  $myfile = fopen($file, "r") or die("Unable to open file!");
  // Output one line until end-of-file
  $lineArray = array();
  while(!feof($myfile)) {
    $str = fgets($myfile);
    $employeeDateArray = explode(",",$str);
    $lineArray = array('name' => $employeeDateArray[0], 'birthDay' => $employeeDateArray[1]);

    yield $lineArray;
    
    // $birthDate = $employeeDateArray['1'];
    // $dateOfBirth = new \DateTime($birthDate);
    // $dateOfBirth = $dateOfBirth->format('m-d');
    // var_dump($dateOfBirth);
  
  }
  fclose($myfile);
}

//var_dump($lineArray);

// function getEmployeeData($file)
// {
//   $myfile = fopen($file, "r") or die("Unable to open file!");
//   // Output one line until end-of-file
//   $lineArray = array();
//   while(!feof($myfile)) {
//     $str = fgets($myfile);
//     $employeeDateArray = explode(",",$str);
//     $lineArray = array('name' => $employeeDateArray[0], 'birthDay' => $employeeDateArray[1]);

//     yield $lineArray;
    
    // $birthDate = $employeeDateArray['1'];
    // $dateOfBirth = new \DateTime($birthDate);
    // $dateOfBirth = $dateOfBirth->format('m-d');
    // var_dump($dateOfBirth);
  
//   }
//   fclose($myfile);
// }
  

// $file = fopen($file, 'r');
// $headers = fgetcsv($file);
// $result = array();
// while ($row = fgetcsv($file)) {
//         if (!$row[0]) continue;
//         $nextItem = array();
//         for ($i = 0; $i < 1; ++$i) {
//                 $nextItem[$headers[$i]] = $row[$i];
//         }
//         $result[] = $nextItem;
//         yield $result;
// }
// fclose($file);
// }
//var_dump($result);

/************** This works Generator ****************** */
// function getLines($file)
// {
//   $fp = fopen($file, 'r');

//   while (!feof($fp)) {
//     $line = fgets($fp);
//     yield $line;
//   }
//   fclose($fp);
// }

function birthdayMatch($line)
{
 $pat = "06-25";
 $pattern = "/".$pat."/i";
 $birthDate = $line['birthDay'];
 $dateOfBirth = new \DateTime($birthDate);
 $dateOfBirth = $dateOfBirth->format('m-d');
  if (preg_match_all($pattern, $dateOfBirth)){
      echo $line['name']. " date of birth " .$line['birthDay'];
    }
}

// function datePattern(){
//   $myfile = fopen("file.txt", "r") or die("Unable to open file!");
// // Output one line until end-of-file
// while(!feof($myfile)) {
//   $str = fgets($myfile);
//   $employeeDateArray = explode(",",$str);
//   $birthDate = $employeeDateArray['1'];
//   $dateOfBirth = new \DateTime($birthDate);
//   $dateOfBirth = $dateOfBirth->format('m-d');
//   yield $dateOfBirth;

// }
// fclose($myfile);
// }

//$file = 'file.txt';
$lineGenerator = getEmployeeData($file);
foreach ($lineGenerator as $line) {
  birthdayMatch($line);
   //var_dump($line);
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