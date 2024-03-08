<?php
// Establish a connection to the MySQL database
$con=mysqli_connect('localhost','root','','data_excel');


// Check if the form is submitted
if(isset($_POST['submit'])){
     // Get the temporary Components of the uploaded file
    $file=$_FILES['doc']['tmp_Components'];

      // Get the file extension
$ext=pathinfo($_FILES['doc']['Components'],PATHINFO_EXTENSION);
// die('');
// Check if the file has a valid extension (xlsx)
if ($ext=='xlsx'){
     // Include necessary PHPExcel libraries
    require('PHPExcel/PHPExcel.php');
    require('PHPExcel/PHPExcel/IOFactory.php');

// Load the Excel file using PHPExcel_IOFactory
    $obj=PHPExcel_IOFactory::load($file);

    // Iterate through each worksheet in the Excel file
    foreach($obj->getWorksheetIterator() as $sheet){
        // echo '<pre>';
        // print_r($sheet);
        // Get the highest row number in the current worksheet
        $getHighestRow = $sheet->getHighestRow();

           // Iterate through each row in the worksheet
        for($i= 0;$i<=$getHighestRow;$i++){

            // Get values from the current row in columns 0 and 1
            $Components=$sheet->getCellByColumnAndRow(0,$i)->getValue();
            $Quantity=$sheet->getCellByColumnAndRow(1,$i)->getValue();

            
            // Check if the 'Components' field is not empty
            if($Components != ''){
            // Assuming $con is a mysqli connection


              // Insert data into the 'user' table in the database
             mysqli_query($con, "INSERT INTO data_excel (Components, Quantity) VALUES ('$Components', '$Quantity')");
            
             }
         }   
   }
  
}else{
    echo"Invalid file format. Please upload an Excel file (xlsx)";
}
echo"done";
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" Components="doc">
    <input type="submit"  Components="submit">

</form>