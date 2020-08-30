<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        factory(Thread::class, 10)->create();
    }

    public function testIndex()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $thread = Thread::first();

        $response = $this->get(route('threads.show', $thread));

        $response->assertStatus(200);
    }
}
