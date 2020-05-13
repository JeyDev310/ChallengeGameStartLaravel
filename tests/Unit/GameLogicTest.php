<?php

namespace Tests\Unit;

use Tests\TestCase;


class GameLogicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExpectsWin()
    {
        $this->artisan('start:game')
        ->expectsQuestion('Enter A Teams players:', '35, 100, 20, 50, 40')
        ->expectsQuestion('Enter B Teams players:', '35, 10, 30, 20, 90')
        ->expectsOutput('Win');
    }

    public function testExpectsWrongInput()
    {
        $this->artisan('start:game')
        ->expectsQuestion('Enter A Teams players:', '35, 100, 20')
        ->expectsQuestion('Enter B Teams players:', '35, 10, 30, 20, 90')
        ->expectsOutput('Wrong Input...');
    }

    public function testExpectsLose()
    {
        $this->artisan('start:game')
        ->expectsQuestion('Enter A Teams players:', '35, 10, 30, 20, 90')
        ->expectsQuestion('Enter B Teams players:', '35, 100, 20, 50, 40')
        ->expectsOutput('Lose');
    }
}
