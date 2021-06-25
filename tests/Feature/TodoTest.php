<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pode_acessar_index()
    {
        $this->get(route('tarefas.index'))->assertStatus(200);
    }

    /** @test */
    public function pode_criar_tarefa()
    {
        $tarefa = Tarefa::factory()->make();
        $this->post(route('tarefas.store'), $tarefa->toArray())
            ->assertStatus(200)
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tarefas', ['titulo' => $tarefa->titulo]);
    }

    /** @test */
    public function titulo_tarefa_requerido()
    {
        $this->post(route('tarefas.store'))
            ->assertSessionHasErrors();
    }

    /** @test */
    public function deletar_tarefa()
    {
        $tarefa = Tarefa::factory()->create();
        $this->delete(route('tarefas.destroy', $tarefa->id))
            ->assertStatus(200)
            ->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('tarefas', ['id' => $tarefa->id]);
    }

    /** @test */
    public function pode_atualizar_tarefa()
    {
        $tarefa = Tarefa::factory()->create();
        $data   = ['titulo' => 'Teste Maquina do Bem!'];
        $this->put(route('tarefas.update', $tarefa->id), $data)
            ->assertStatus(200)
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tarefas', array_merge($data, ['id' => $tarefa->id]));
    }

}
