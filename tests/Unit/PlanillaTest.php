<?php

namespace Tests\Unit;
//use Illuminate\Support\Facades\Route;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class PlanillaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_vista_login()
    {   
        $response= $this->get(route("login"));
        $response->assertStatus(200);
    }

       public function test_vista_register()
    {   
        $response= $this->get(route("home"));
        $response->assertStatus(200);
    }

 

  
}
