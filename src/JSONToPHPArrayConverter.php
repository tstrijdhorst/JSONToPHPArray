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
				$string .= '  '.var_export($key, true).' => ';
			}
			
			if (is_array($value)) {
				$string .= $this->indent($this->arrayToPHPSyntax($value)).','.PHP_EOL;
				continue;
			}
			
			$string .= var_export($value, true).','.PHP_EOL;
		}
		
		$string .= ']';
		
		return $string;
	}
	
	/**
	 * @param string $string
	 * @return string
	 */
	private function indent($string) {
		$lines = explode(PHP_EOL, $string);
		
		$stringIndented = $lines[0].PHP_EOL;
		$lineCount      = count($lines);
		for ($i = 1; $i < $lineCount - 1; $i++) {
			$stringIndented .= '  '.$lines[$i].PHP_EOL;
		}
		$stringIndented .= '  '.$lines[$lineCount - 1];
		
		return $stringIndented;
	}
}