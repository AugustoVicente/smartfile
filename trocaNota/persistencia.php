<?php
	class Persistencia 
	{
		public function ChamarProcedimentoJsonLaudo($someJSON,$procedure,$last_id){

			$jsonLaudo = json_decode("[$someJSON]");

			$valueAntiga = "";
			foreach ($jsonLaudo as $key => $jsons) {
				foreach($jsons as $key => $value) {
					$value = $valueAntiga.",".$value;
         			$valueAntiga = $value; 
         		}
     		}
     		return "Call $procedure(".substr($value, 1, -1).",@idLaudo)";
    	}

    	public function ChamarProcedimentoJsonFator($someJSON,$procedure){
    	
    		$jsonFator = json_decode($someJSON);

    		foreach ($jsonFator as $key => $jsons) {
    			foreach($jsons as $key => $value) {
         			$queryFator = "Call $procedure(".$value.")".";".$queryFator;
     			}
			}

			return $queryFator;

    	}
	}
?>