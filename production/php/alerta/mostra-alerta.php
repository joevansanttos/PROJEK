<?php
	ob_start();
	session_start();	
	function mostraUsuarioLogado($logado){
		if($logado == 1){
?>
		<script>
		  $.notify('Bem Vindo a Projek!', "success");
		</script>
<?php
		}
	}
?>


<?php
	function mostraSucesso(){
?>
	<script>
	  $.notify('<?=$_SESSION['success']?>', "success");
	</script>

<?php
	}
?>


<?php
	function mostraError(){
?>
	<script>
	  $.notify('<?=$_SESSION['error']?>', "error");
	</script>

<?php
	}
?>

