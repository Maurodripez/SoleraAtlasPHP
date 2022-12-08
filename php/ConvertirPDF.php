<?php
include "./pdfcrowd.php";

try
{
    // create the API client instance
    $client = new \Pdfcrowd\ImageToPdfClient("desarrolloseas", "0001eea3a2da824cf267dc2d863528b9");

    // run the conversion and write the result to a file
    $client->convertFileToFile("20221208191801.png", "logo.pdf");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>