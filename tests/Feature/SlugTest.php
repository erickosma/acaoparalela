<?php

namespace Tests\Feature;

use App\Enums\UserType;
use App\Ong;
use App\Slug;
use App\Voluntary;
use Tests\IntegrationTestCase;

class SlugTest extends IntegrationTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSlug()
    {
        $title = 'Um teste de string';
        $titleResult = 'um-teste-de-string-9';
        $slug = factory(Slug::class, 10)->create(['title' => $title]);
        $this->assertEquals($titleResult, $slug->last()->title_slug);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSlugVoluntary()
    {
        $voluntary = factory(Voluntary::class)->create();
        $attr = ['title' =>  $voluntary->user->name, 'slugable_id' => $voluntary->id, 'slugable_type' => UserType::VOLUNTARY];

        $slug = factory(Slug::class)->create($attr);

        $this->assertEquals($attr['title'], $slug->title);
        $this->assertEquals($voluntary->user->name, $slug->title);
        $this->assertEquals(UserType::VOLUNTARY, $slug->slugable_type);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSlugOng()
    {
        $ong = factory(Ong::class)->create();
        $attr = ['title' =>  $ong->user->name, 'slugable_id' => $ong->id, 'slugable_type' => UserType::ONG];

        $slug = factory(Slug::class)->create($attr);

        $this->assertEquals($attr['title'], $slug->title);
        $this->assertEquals($ong->user->name, $slug->title);
        $this->assertEquals(UserType::ONG, $slug->slugable_type);
    }
}
