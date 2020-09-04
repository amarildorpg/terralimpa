<?php
if (!empty($_POST['valid'])) {
$file= $_POST=['arquivo'];


if( $_FILES ) { // Verificando se existe o envio de arquivos.
	
	if( $_FILES['arquivo'] ) { // Verifica se o campo não está vazio.
		
		$dir = 'import/'; // Diretório que vai receber o arquivo.
		$tmpName = $_FILES['arquivo']['tmp_name']; // Recebe o arquivo temporário.
		$name = 'x.csv'; // Recebe o nome do arquivo.
		
		// move_uploaded_file( $arqTemporário, $nomeDoArquivo )
		if( move_uploaded_file( $tmpName, $dir . $name ) ) { // move_uploaded_file irá realizar o envio do arquivo.		
		   echo "<script>alert('Importado Finalizado.')</script>";
			header('Location: imp2.php'); // Em caso de sucesso, retorna para a página de sucesso.			
		} else {
              echo "<script>alert('Erro ao Importar.')</script>";			
			header('Location: imp.php'); // Em caso de erro, retorna para a página de erro.			
		}
		
	}

}
else {
	echo "sem arquivo";
}


}else{ ?>

<form action="imp.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="arquivo" id="arquivo"><br>
<input type='hidden' name='valid' value='1' >
 <input type="submit" value="Enviar">
<input type="reset" value="Apagar">
 </form>
<?php } ?>


