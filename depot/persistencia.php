<?php
	class Persistencia 
	{
		public function ChamarProcedimentoJsonLaudo($someJSON,$procedure){

			$jsonLaudo = json_decode("$someJSON");

			$valueAntiga = "";
			foreach ($jsonLaudo as $key => $jsons) {
				foreach($jsons as $key => $value) {
					$value = $valueAntiga.",".$value;
         			$valueAntiga = $value; 
         		}
     		}
     		return "Call $procedure(".substr($value, 1, -1)."')";
    	}
	}
?>