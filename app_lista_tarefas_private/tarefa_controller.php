<?php
    require "../../app_lista_tarefas_private/tarefa.model.php";
    require "../../app_lista_tarefas_private/tarefa.service.php";
    require "../../app_lista_tarefas_private/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir') {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();
   
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('Location: nova_tarefa.php?inclusao=1');

   } else if($acao == 'recuperar') {

        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
   } else if($acao == 'atualizar') {
    
     //echo '<pre>';
     //print_r($_POST);
     //echo '</pre>';

     $tarefa = new Tarefa();
     $tarefa->__set('id', $_POST['id']);
     $tarefa->__set('tarefa', $_POST['tarefa']);

     $conexao = new Conexao();

     $tarefaService = new TarefaService($conexao, $tarefa);
     if($tarefaService->atualizar()) {
          header('Location: todas_tarefas.php');
     }

   } else if($acao == 'remover') {
     
     $tarefa = new Tarefa();
     $tarefa->__set('id', $_GET['id']);

     $conexao = new Conexao();

     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefaService->remover();

     header('Location: todas_tarefas.php');
   }
?>