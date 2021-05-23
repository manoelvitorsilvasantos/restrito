<?php
	
	interface DefaultDAO{
		public function save($data);
		public function update($data, $id);
		public function delete($id);
	}

?>