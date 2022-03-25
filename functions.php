<?php
/**
 *Verifica se o cliente escolheu sim ou não
 *
 * @return void
 */
function VerificaCliente(){

    if (isset($_POST["cliente"])) {
        if ($_POST["cliente"] ==  "sim") {
            header("Location: login.php");
        } elseif ($_POST["cliente"] ==  "nao") {
            header("Location: cadastro.php");
        }
    }
}
/**
 * 
 * transforma a senha em hash e cria o arquivo da conta do usuario
 *
 * @param [array] $conta
 * @return void
 */
function save($conta){
    if (file_exists('cadastros/medicos/' . $conta["email"] . '.json')) {
        return false;
    }
    if (file_exists('cadastros/pacientes/' . $conta["email"] . '.json')) {
        return false;
    }
    $conta["password"] = password_hash($conta["password"], PASSWORD_DEFAULT);
    if($conta["cliente"]=="paciente"){
        file_put_contents('cadastros/pacientes/' . $conta["email"] . '.json', json_encode($conta));
    return true;
    }
    else{
        file_put_contents('cadastros/medicos/' . $conta["email"] . '.json', json_encode($conta));
    return true;
    }
}
function load($dados){
   if (file_exists('cadastros/medicos/' . $dados["email"] . '.json')) {
    $conta=file_get_contents('cadastros/medicos/' . $dados["email"] . '.json');
    return json_decode($conta, true);
   }
   elseif (file_exists('cadastros/pacientes/' . $dados["email"] . '.json')) {
    $conta=file_get_contents('cadastros/pacientes/' . $dados["email"] . '.json');
    return json_decode($conta, true);
   }
   else {
       return null;
   }    
}
function seasonstartmedico(){
    session_start();
    if (!isset($_SESSION) || empty($_SESSION["login"]) || $_SESSION["login"]["cliente"] != "medico") {
    header("Location: index.php");}
}
function loadpacientes(){
   $arquivos_pacientes=array_slice(scandir("./cadastros/pacientes/"), 2);
   $pacientes = array();
   for($i=0;$i<count($arquivos_pacientes);$i++){
        $conta=file_get_contents('cadastros/pacientes/' . $arquivos_pacientes[$i]);
        $conta=json_decode($conta, true);
        array_push($pacientes, $conta);
   }
   return $pacientes;
}
function addprontuario($conta, $dados){
    //Carrega o arquivo
    $arquivo=file_get_contents('cadastros/pacientes/'.$conta["email"].'.json');
    // Decodifica a conta
    $arquivo=json_decode($arquivo,true);
    //Adicionar o prontuario na conta
    if($arquivo["prontuarios"]==null){
        $arquivo["prontuarios"]=array();
    }
    array_push($arquivo["prontuarios"],$dados);
    // Salvar no mesmo lugar
    file_put_contents('cadastros/pacientes/' . $conta["email"] . '.json', json_encode($arquivo));
    return $arquivo;
}
function seasonstartpaciente(){
    session_start();
    if (!isset($_SESSION) || empty($_SESSION["login"]) || $_SESSION["login"]["cliente"] != "paciente"){
    header("Location: index.php");}
}
function saveouvidoria($ouvidoria){
    if (file_exists('cadastros/ouvidoria/ouvidoria.json')) {
        $load=file_get_contents('cadastros/ouvidoria/ouvidoria.json');
        $load=json_decode($load,true);
        array_push($load,$ouvidoria);
        file_put_contents('cadastros/ouvidoria/ouvidoria.json', json_encode($load));
    }
    else{
        $load=array();
        array_push($load,$ouvidoria);
        file_put_contents('cadastros/ouvidoria/ouvidoria.json', json_encode($load));
    }
}
