<?php
require 'php/conn.php';
$row = 1;
if (($handle = fopen("import/x.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
       // echo "<p> $num fields in line $row: <br /></p>\n";   
        $row++;
        for ($c=0; $c < $num; $c++) {
            $blackpowder = $data;
            $dynamit = implode(";", $blackpowder);
            $pieces = explode(";", $dynamit);
     
        }
	if ($pieces[5]=='Aprovada'){
	echo $pieces[5].'--'.$pieces[15].'<br>';
	$sel = mysqli_query($conn, "select * from pedido where pedido_id=".$pieces[15]." ");
    if (mysqli_num_rows($sel) >'0') {
    foreach ($sel as $sel_view) ;
   
   $update_pedido = "update pedido set pedido_status = 1 where pedido_id = '".$pieces[15]."'";
    mysqli_query($conn,$update_pedido);
	echo "<script>alert('Atualizado com sucesso.')</script>";			
			header('Location: index.php');
   
       }
	}
    }
}
?>