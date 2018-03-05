<?php

namespace JTPAC;

class JSONToPHPArrayConverter {
	/**
	 * @param string $json
	 * @return string
	 * @throws \Exception - When string cannot be decoded to a PHP array due to invalid JSON
	 */
	public function convert($json) {
		$array = json_decode($json, true);
		
		if (is_null($array)) {
			throw new \Exception('Invalid JSON');
		}
		
		return $this->arrayToPHPSyntax($array);
	}
	
	/**
	 * @param array $array
	 * @return string
	 */
	private function arrayToPHPSyntax(array $array) {
		$string = '['.PHP_EOL;
		
		foreach ($array as $key => $value) {
			if (is_string($key)) {
				$string .= "\t".var_export($key, true)." => ";
			}
			
			if (is_array($value)) {
				$string .= "\t".$this->arrayToPHPSyntax($value).','.PHP_EOL;
				continue;
			}
			
			$string .= var_export($value, true).','.PHP_EOL;
		}
		
		$string .= ']';
		
		return $string;
	}
}