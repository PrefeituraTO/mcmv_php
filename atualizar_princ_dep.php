<?php 
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";

$principal = new Principal($pdo);
$dependente = new Dependentes($pdo);


if (isset($_GET['cpf']) && !empty($_GET['cpf'])) {
	$nome         = $_POST['nome'];
	$sexo         = $_POST['sexo'];;
	$est_civil    = $_POST['est_civil'];
	$dt_nasc      = $_POST['dt_nasc'];
	$cpf          = $_POST['cpf'];
	$rg           = $_POST['rg'];
	$endereco     = $_POST['endereco']; 
	$bairro       = $_POST['bairro']; 
	$zona         = $_POST['zona'];
	$telefone     = $_POST['telefone'];
	$email        = $_POST['email'];
	$naturalidade = $_POST['naturalidade'];
	$tempo        = $_POST['tempo'];
	$ocupacao     = $_POST['ocupacao'];
	$remuneracao  = $_POST['remuneracao'];
	$outras_rendas= $_POST['outras_rendas'];
	$cadunico     = $_POST['cadunico'];
	$nis          = $_POST['nis']; 
	$bolsa_familia= $_POST['bolsa_familia']; 
	$bpc          = $_POST['bpc'];
	$escolaridade = $_POST['escolaridade']; 
	$imovel       = $_POST['imovel'];
	$comodos      = $_POST['comodos']; 
	$aluguel      = $_POST['aluguel'];
	$risco        = $_POST['risco'];
	$deficiencia  = $_POST['deficiencia'];
	$observ       = $_POST['observ'];

	$principal->updatePrincipal($nome, $sexo, $est_civil, $dt_nasc, $cpf, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ);

	$id_principal = $pdo->lastInsertId();
	if (!empty($_POST['composicaototal'])) {
		$composicaototal = $_POST['composicaototal'];
		if($composicaototal>0){
			for ($i=0;$i<$composicaototal;$i++){
				if (isset($_POST['nome'.$i]) && !empty($_POST['nome'.$i])) {
					$tmpnome = $_POST['nome'.$i];
					$tmpidade = $_POST['idade'.$i];
					$tmpparentesco = $_POST['parentesco'.$i];
					$tmpdocumentacao = $_POST['documentacao'.$i];
					$tmpocupacao = $_POST['ocupacao'.$i];
					$tmpremuneracao = $_POST['remuneracao'.$i];
					$tmpoutras_rendas = $_POST['outras_rendas'.$i];
					$dependente->inserirDependentes($tmpnome, $id_principal, $tmpidade, $tmpparentesco, $tmpdocumentacao, $tmpocupacao, $tmpremuneracao, $tmpoutras_rendas);
				}  
			}
		}
	}

}
?>