<?php
	
	class Utils{

		public function verificar($campos)
		{
			foreach($campos as $fields){
				if(empty($fields))
				{
					return TRUE;		
				}
				else{
					return FALSE;
				}
			}
		}

	}
?>