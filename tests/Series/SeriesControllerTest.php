<?php

declare(strict_types=1);

namespace Series;

use App\Models\Serie;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SeriesControllerTest extends \TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testDeveAdicionarASerieNoBanco()
    {
        $dados = ['nome' => 'breaking bad'];

        $response = $this->post('/api/series', $dados);
        $response->assertResponseStatus(201);
    }

    public function testDeveRetornarNomeInvalido()
    {
        $dados = ['nome' => ''];

        $response = $this->post('/api/series', $dados);
        $response->assertResponseStatus(422);
    }

    public function testDeveRetornarNomeJaInformado()
    {
        $dados = ['nome' => 'breaking bad'];
        $this->post('/api/series', $dados);

        $response = $this->post('/api/series', $dados);
        $response->assertResponseStatus(422);
    }

    public function testDeveBuscarASeriePeloId()
    {
        $this->post('/api/series', ['nome' => 'Breaking bad']);

        $response = $this->get('/api/series/1');

        $response->assertResponseStatus(200);
    }

    public function testDeveInformarSerieNaoEncontrada()
    {
        $response = $this->get('/api/series/1');

        $response->assertResponseStatus(404);
    }

    public function testDeveAtualizarOsDadosDaSerie()
    {
        $this->post('/api/series', ['nome' => 'breaking bad']);

        $response = $this->put('/api/series/1', ['nome' => 'Breaking Bad']);

        $response->assertResponseStatus(200);
    }

    public function testDeveExcluirASerie()
    {
        $this->post('/api/series', ['nome' => 'breaking bad']);

        $response = $this->delete('/api/series/1', ['nome' => 'Breaking Bad']);

        $response->assertResponseStatus(204);
    }


    protected function tearDown(): void
    {
        Serie::truncate();
    }
}
