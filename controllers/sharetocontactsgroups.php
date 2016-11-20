<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
require(realpath(__DIR__ . '/../classes/class.Message.php'));
require(realpath(__DIR__ . '/../classes/class.Download_ShareFile.php'));

$pdfid=$_POST['pdfid'];
$username=$_SESSION['username'];
$memberscontact=$_POST['memberscontact'];
$membersgroup=$_POST['membersgroup'];
$msg="A PDF is shared.Please click on media to view it!";

echo $msg;
$message=new Message();
$share=new Download_ShareFile();
 foreach($memberscontact as $member){
                
                $message->sendMessage($member,$msg,'c');
                $share->shareFile($member, $username, $pdfid, 'c');
            }
 foreach($membersgroup as $member){
                
                $message->sendMessage($member,$msg,'g');
                $share->shareFile($member, $username, $pdfid, 'g');
            }
            
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
