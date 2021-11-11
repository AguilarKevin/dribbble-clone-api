<?php

namespace Tests\Feature\GraphQL;

use App\Models\Shot;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ShotsQueryTest extends TestCase
{

    use WithFaker;

    /** @test */
    public function it_should_return_shots(): void
    {

        User::factory(4)->create();
        Shot::factory(5)->create();
        
        $this->graphQL(
        /* @lang GraphQL */
            '
                {
                    shots(first: 3 ){
                        data{
                            user{
                                name
                                email
                                avatar
                                tag
                            }
                            id
                            title
                            description
                            media{
                                domain
                                path
                                mimetype
                            }
                            tags{
                                name
                                slug
                            }
                            saves
                            views
                        }
                    }
                }
                '
        )->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                $json->has('data.shots.data')
                ->has('data.shots.data.0');
            });
    }

    /** @test */
    public function it_should_return_a_shot(): void
    {

        User::factory(1)->create();
        Shot::factory()->create([
            'id' => 1,
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(6),
            'views'  => $this->faker->numberBetween(50, 7000),
            'saves'  => $this->faker->numberBetween(50, 70),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
        ]);


        $this->graphQL(
        /* @lang GraphQL */
            '
                {
                    shot(id: 1){
                        user{
                             name
                                email
                                avatar
                                tag
                        }
                        id
                        title
                        description
                        media{
                             domain
                             path
                             mimetype
                        }
                        tags{
                             name
                             slug
                        }
                        saves
                        views
                    }
                }
                '
        )->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                $json->has('data.shot.title');
            });
    }
}
