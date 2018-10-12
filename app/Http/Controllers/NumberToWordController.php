<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\NumberToWord;

/**
 * Controller convert number into words
 * 
 * @author Lalit Patel
 *
 */

class NumberToWordController extends Controller
{
    /**
     * Convert number to words
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function convert(Request $request){

		$number = $request->post('number');

		$numberToWord = new NumberToWord();
		$word = $numberToWord->convert($number);
		
		return view('welcome',array('numberToWord' => $word,'number' =>$number ));
    }
}
