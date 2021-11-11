<?php

namespace Tests\Feature\GraphQL;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ShotsQueryTest extends TestCase
{
    /** @test */
    public function it_should_return_shots(): void
    {
        $this->seed();

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
                ->has('data.shots.data.0')->dd();
            });
    }

    /** @test */
    public function it_should_return_a_shot(): void
    {
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
                $json->has('data.title');
            });
    }
}
