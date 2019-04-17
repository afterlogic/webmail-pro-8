<?php 
include_once dirname(__File__) . '/system/autoload.php';
	
$bAdminPrivileges = true;

\Aurora\System\Api::Init($bAdminPrivileges);

$DbHost = '';
$DbLogin = '';
$DbPassword = '';
$DbName = '';

$oCoreDecorator = \Aurora\System\Api::GetModuleDecorator('Core');

if ($oCoreDecorator)
{
	$oCoreDecorator->UpdateSettings($DbLogin, $DbPassword, $DbName, $DbHost);
}
