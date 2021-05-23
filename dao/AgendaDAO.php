<?php

	class AgendaDAO implements defaultDAO{


		public function save($data)
		{
			$db = new Conector;
			$query = $db->prepare("INSERT INTO agenda (nome, cel, tipo, data, horario VALUES(?,?,?,?,?)");
			$param = array(
				$data[0],
				$data[1],
				$data[2],
				$data[3],
				$data[4],
				$data[5]
			);
			$query->execute($param);
			$db = null;
		}

		public function update($data, $id)
		{
			$db = new Conector;
			$query = $db->prepare("UPDATE agenda SET nome = ?, cel = ?, tipo = ?, data = ?, horario = ? WHERE id = ?");
			$param = array(
				$data[0],
				$data[1],
				$data[2],
				$data[3],
				$data[4],
				$data[5],
				$id
			);
			$query->execute($param);
			$db = null;
		}

		public function delete($id)
		{
			$db = new Conector;
			$query = $db->prepare("DELETE FROM agenda WHERE id = ?");
			$query->execute($id);
			$db = null;
		}

		public function listar()
		{
			$db = new Conector;
			$query = $db->prepare("SELECT *FROM agenda");
			$param = array();
			$query->execute();

			while($saida = $query->fetch(PDO::FETCH_ASSOC))
			{
				$param[$saida['_id']] = array(
					'id'=>$saida['_id'],
					'nome'=>$saida['nome'],
					'cel'=>$saida['cel'],
					'tipo'=>$saida['tipo'],
					'dt'=>$saida['dt'],
					'horario'=>$saida['horario']
				);
			}
			$db = null;
			return json_encode($param);
		}


	}
	/*
	$api = new DAO;
	header('Content-Type: application/json');
	echo $api->listar();
	*/
?>