<?php

namespace Tests\Unit;

use Savva\Url;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testTags()
    {
        factory(Url::class,50)->create();

        $url=DB::table('urls')->groupBy('tag')->pluck('tag');
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $url);
        $this->assertInternalType('array', $url->all());

        $this->assertEquals($url->all(),['course','google']);

    }
}
