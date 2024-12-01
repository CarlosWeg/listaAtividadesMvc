<?php


    require_once '../controllers/TaskController.php';
    require_once '../funcoes.php';

    $oTaskController = new TaskController();

    $sAction = $_GET['action'] ?? 'index';

    switch ($sAction){
        case 'index':
            $aTasks = $oTaskController->index();
            require '../views/tasks/index.php';
            break;
        
        case 'store':
            $sDescricao = $_POST['description'];
            $sResult = $oTaskController->store($sDescricao);            
            redirectPage('index.php');
            echo $sResult;
            break;
        
        case 'update':
            $iID = $_GET['id'];
            $sIsCompleted = $_GET['is_completed'];
            $sResult = $oTaskController->update($iID,$sIsCompleted);
            redirectPage('index.php');
            echo $sResult;
            break;
        
        case 'delete':
            $iID = $_GET['id'];
            $sResult = $oTaskController->delete($iID);
            redirectPage('index.php');
            echo $sResult;
            break;
        
        default:
            echo 'Ação inválida!';
    }