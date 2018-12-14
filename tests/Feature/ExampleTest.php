<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
   /*  public function testContenuPage()
    {
        $response = $this->get('/');

        $response->assertSee('news');
    }
    class qui calcul moyen de 2 personne 
      fnct moy,max,min,dic(si la div par 0 return 0)
      travail par conver télécharger xdébug

    */
}
