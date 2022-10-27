<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Userlanding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserlandingTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Userlanding::class);

        $component->assertStatus(200);
    }
}
