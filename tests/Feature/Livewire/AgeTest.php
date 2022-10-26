<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Age;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AgeTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Age::class);

        $component->assertStatus(200);
    }
}
