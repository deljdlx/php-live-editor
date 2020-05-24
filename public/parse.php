<?php


require(__DIR__.'/../function.php');


require(__DIR__.'/../source/class/ErrorManager.php');
require(__DIR__.'/../source/class/Workspace.php');
require(__DIR__.'/../source/class/VariableToHTML.php');
require(__DIR__.'/../source/class/Source.php');





if(!filter_input(INPUT_POST, 'content')) {
    return;
}

$whitelist = array(
    '192.168.0.10',
    '127.0.0.1',
    '::1'
);

if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    header('HTTP/1.0 403 Forbidden');
    exit();
}




$workspace = new Workspace();
$workspace->enableErrorHandling();
$workspace->obStart();



$source = new Source($_POST['content']);

$variables = $source->getVariables();
$workspace->getOutput();


if (is_array($variables)) {
    header('Content-type: application/json');

    echo json_encode([
        'success' => true,
        'output' => $workspace->getOutput(),
        'buffers' => $workspace->getBuffers(),
        'variables' => $variables,
        'errors' => $workspace->getErrors()
    ]);

}
