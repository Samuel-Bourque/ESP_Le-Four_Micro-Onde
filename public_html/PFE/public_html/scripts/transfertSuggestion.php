<?php
session_start();
$aEteApprouve = $_GET["approved"];
$id = $_GET["id"];
if(isset($_SESSION['authentifie'])){
    include "..//..//bd_connexion//infos_connexion.php";
    include "..//..//bd_connexion//pdo_connect.php";
    try {$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);} 
    catch (Exception $e) {exit($e);}

    if($aEteApprouve == "true"){
        $stmtInsertSuggestion = $pdo->prepare("INSERT INTO [dbo].[Videos] (code,titre,description) 
        SELECT code, titre, description FROM [dbo].[EnAttente] WHERE id = ?");
        $stmtInsertSuggestion->execute([$id]);
    }
    $stmtDeleteSuggestion = $pdo->prepare("DELETE FROM [dbo].[EnAttente] WHERE id = ?");
    $stmtDeleteSuggestion->execute([$id]);
}
?>
<script>
    window.location.href = document.referrer;
</script>
