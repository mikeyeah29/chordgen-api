<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChordProgression;

class ChordProgressionController extends Controller
{
    public function generate(){

    	// new ChordProgression()
		// return progression
		/*
			key
			array of chords
			{
				chord name,
				diagram,
				length		
			},
			{
		
			}
		*/

		$chordGen = new ChordProgression(4);
		$progression = $chordGen->getChords();
		$key = $chordGen->getKey();

		return response()->json(['chords' => $progression, 'key' => $key], 200);

    }
}
