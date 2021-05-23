<?php
	
	require_once __DIR__.'/config.php';
	
	class API{
		/*Método que faz a seleção da tabela correspondente, já configurado.*/
		function getSelectTableUsers()
		{
			$db = new Connect;
			$users = array();
			$data = $db->prepare('SELECT * FROM users ORDER BY name');
			$data->execute();
			while($OutputData = $data->fetch(PDO::FETCH_ASSOC))
			{
				$users[$OutputData['id']] = array(
					'id' => $OutputData['id'],
					'name' => $OutputData['name'],
					'age' => $OutputData['age']
				);
			}
			return json_encode($users);
		}
	}

	$API = new API;
	header('Content-Type: application/json');
	echo $API->getSelectTableUsers();
?>