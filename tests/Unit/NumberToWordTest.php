<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\NumberToWord;

class NumberToWordTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $numberToWord = new NumberToWord();
        
        $word = $numberToWord->convert(10000);
        
        $this->assertEquals('Ten Thousand', $word );
    }
}
