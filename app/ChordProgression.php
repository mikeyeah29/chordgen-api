<?php

namespace App;

class ChordProgression {

	var $chromatic_scale = ['c', 'c#', 'd', 'd#', 'e', 'f', 'f#', 'g', 'g#', 'a', 'a#', 'b'];
	var $major_scale_degrees = [
		array('degree' => 1, 'form' => 'major', 'notation' => ''),
		array('degree' => 3, 'form' => 'minor', 'notation' => 'm'),
		array('degree' => 5, 'form' => 'minor', 'notation' => 'm'),
		array('degree' => 6, 'form' => 'major', 'notation' => ''),
		array('degree' => 8, 'form' => 'seventh', 'notation' => '7'),
		array( 'degree' => 10, 'form' => 'minor', 'notation' => 'm'),
		array( 'degree' => 12, 'form' => 'diminished', 'notation' => '~')
	];

	var $chords = [];
	var $key = '';

	private function createChord(){
		$chord = $this->major_scale_degrees[rand( 0, 5 )];
		$chord['name'] = $this->chromatic_scale[$chord['degree'] - 1] . $chord['notation'];
		$chord['img'] = '/public/img/chords/c.png';
		return $chord;
	}

	public function getChords(){
		return $this->chords;
	}

	public function getKey(){
		return $this->key;
	}

	private function createKey(){
		// random key
		$this->key = $this->chromatic_scale[rand( 0, 11 )];
		// reorder the chromatic scale to fit new key
		$keyIndex = array_search($this->key, $this->chromatic_scale);
		$start = array_slice($this->chromatic_scale, 0, $keyIndex);
		$end = array_slice($this->chromatic_scale, $keyIndex);
		$this->chromatic_scale = array_merge($end, $start);
	}

	public function __construct($bars){
		$this->createKey();
		// generate chords in the key for the amount of bars given
		for($i=0;$i<$bars;$i++){
			$this->chords[] = $this->createChord(); 
		}
	}

}


?>