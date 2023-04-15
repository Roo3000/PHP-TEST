<?php
session_start();

require 'include/fpdf.php';

include_once 'include/db.php';


class myPDF extends FPDF{
    function header(){
        $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);
        $session=$_SESSION['id'];
        $sql = "SELECT* FROM test.user where uuid LIKE '$session'";
        $component=$db->query($sql);
        $comp=$component->fetchAll();
        if(count($comp)==1){

            foreach($comp as $row){
                $uuid = $row['uuid'];
                $username = $row['username'];
                $phone = $row['number'];
                $city = $row['city'];
            }
        }
        
        $this->Ln(17);
        $this->SetFont('Times', 'BU' , 16);
        $this->cell(0,0,'Your Information',0,0,'C');

        $this->Ln(18);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'UUID :',0,0,'L');
        $this->cell(10,0,'',0,0,'');
        $this->SetFont('Times', '' , 12);
        $this->cell(-240,0,''.$uuid.'',0,0,'C');
        
        $this->Ln(18);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'NAME :',0,0,'L');
        $this->cell(10,0,'',0,0,'');
        $this->SetFont('Times', '' , 12);
        $this->cell(-240,0,''.$username.'',0,0,'C');

        $this->Ln(18);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'Phone Number :',0,0,'L');
        $this->cell(10,0,'',0,0,'');
        $this->SetFont('Times', '' , 12);
        $this->cell(-240,0,''.$phone.'',0,0,'C');

        $this->Ln(18);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'CITY :',0,0,'L');
        $this->cell(10,0,'',0,0,'');
        $this->SetFont('Times', '' , 12);
        $this->cell(-240,0,''.$city.'',0,0,'C');
        
       
    }

    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Output();

?>