<?php
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Credit Application', 0,1,'L');
$pdf->SetFont('Arial','',10);

$pdf->Cell(40,20,'This is an application with one person.', 0,1,'L');


$pdf->Cell(40,20,'I intend to apply for joint credit.', 0,1,'L');

$pdf->Cell(40,10,'Applicant: By    _____________________________________________Date______________________', 0,1,'L');
//$pdf->Cell(40,10,'Co-Applicant: By ____________________________________________Date______________________', 0,1,'L');
$pdf->Cell(40,0,'________________________________________________________________________________________________', 0,1,'L');

$pdf->Cell(40,10,'You are applying for credit and information on this documents is evidence on what we are collecting and are relying on your ', 0,1,'L');
$pdf->Cell(50,0,'own income or assets and not the income or assets of another person as the basis for repayment of the credit requested.', 0,1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,20,'By signing this application:', 0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,4,'I authorize dealer and any finance company, bank or other financial institution to which the Dealer submits my ', 0 ,2 ,'L');
$pdf->Cell(40,4,'application ("you")to investigate my credit and employment history, obtain credit reports, and release information ',0 ,2 ,'L');
$pdf->Cell(40,4,'about your credit experience with me as the law permits.',0 ,2 ,'L');
$pdf->Cell(40,3,' ', 0,1,'L');

$pdf->Cell(40,4,'If an account is created, I authorize you to obtain credit reports for the purpose of reviewing or taking collection action ', 0,1,'L');
$pdf->Cell(40,4,'on the account, or for other legitimate purposes associated with the acount. ', 0 ,1 ,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Monitoring, Recording, and Collection Communications',0 ,5 ,'L');


$pdf->SetFont('Arial','',10);
$pdf->Cell(40,4,'I agree that you, your affiliates, agents and service providers may monitor and record telphone calls regarding my ', 0,1,'L');
$pdf->Cell(40,4,'account to assure the quality of your service or for other reasons.  I also expressly consent and agree to you, you ',0 ,2 ,'L');
$pdf->Cell(40,4,'affilates, agents and service providers using written, electronicc or verbal means to contact me as the law allows. This',0 ,2 ,'L');
$pdf->Cell(40,4,'consent includes, but is not limited to, contact by manual clling methods, prerecorded or artficial oice messages, ',0 ,2 ,'L');
$pdf->Cell(40,4,'text messages, emails and/or automatic telephone dialing systems.  I agree you, your affiliates, agents and service ',0 ,2 ,'L');
$pdf->Cell(40,4,'providers may do so using any em-mail address or any telphone number I provided, no or in the future, including a ',0 ,2 ,'L');
$pdf->Cell(40,4,'number for acellular phone or other wireless device, regardless of whether I incur charges as a result.',0 ,2 ,'L');

$pdf->Cell(40,8,'I certify that I have read and agree to the terms of this application and that the information in it is complete and true.',0 ,2 ,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,4,'If you sign this credit application electronically, you intend that process to be your electronic signature on an',0 ,5 ,'L');
$pdf->Cell(40,4,'electronic application, acknowledge receipt of all disclosures provided on the credit application, and give ',0 ,5 ,'L');
$pdf->Cell(40,4,'your authorization and consent to the recipient(s) of this application to take the actions identified in the credit ',0 ,5 ,'L');
$pdf->Cell(40,4,'application.',0 ,5 ,'L');

$pdf->Cell(50,5,'',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');


$pdf->SetFont('Arial','U',12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,0,'Credit Application Signature',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,8,'Applicant: By       ____________________________________________Date______________________',0 ,5 ,'L');
$pdf->Cell(50,8,'',0 ,5 ,'L');
//$pdf->Cell(50,8,'Co-Applicant: By ____________________________________________Date______________________',0 ,5 ,'L');








?>