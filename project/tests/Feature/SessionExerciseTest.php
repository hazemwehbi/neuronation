<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SessionExerciseTest extends TestCase
{
   /**
     * Test to fetch user exercises with last 12 session along with last test category.
     *
     * @return void
     */
    public function testListUserSessionExercises()
    {
        $user = User::find(1);

        $this->actingAs($user, 'api')
                    ->get('/api/v1/users/1/get-user-exercises')
                    ->assertStatus(200)
                    ->assertJson($this->getTestData());

        $this->assertAuthenticatedAs($user);
    }

    private function getTestData(){
        $data = [
                    "success" => true,
                    "data" => [
                        "exercises" => [
                            [
                                "name" => "Android",
                                "score" => 44
                            ],
                            [
                                "name" => "IOS",
                                "score" => 71
                            ],
                            [
                                "name" => "Hybrid",
                                "score" => 76
                            ],
                            [
                                "name" => ".NET",
                                "score" => 81
                            ],
                            [
                                "name" => "LAMP Stack",
                                "score" => 87
                            ],
                            [
                                "name" => "MEAN Stack",
                                "score" => 92
                            ],
                            [
                                "name" => "MERN Stack",
                                "score" => 97
                            ],
                            [
                                "name" => "Photoshop",
                                "score" => 102
                            ],
                            [
                                "name" => "Blog writer",
                                "score" => 108
                            ],
                            [
                                "name" => "Copy writer",
                                "score" => 113
                            ],
                            [
                                "name" => "Automated Testing",
                                "score" => 118
                            ],
                            [
                                "name" => "Conventional Testing",
                                "score" => 123
                            ]
                        ],
                        "lastest_exercise" => [
                            [
                                "id" => 35,
                                "name" => "Exercise 35",
                                "category_id" => 12,
                                "session_id" => 9,
                                "score" => 41,
                                "created_at" => 1576161160,
                                "updated_at" => 1576161160,
                                "category_name" => "Conventional Testing"
                            ]
                        ]
                    ],
                    "meta" => [
                        "row_count" => 12,
                        "message" => "Total 12 record(s) found"
                    ]
                ];

        return $data;
    }


    /**
     * Test to fetch user's empty exercises list
     *
     * @return void
     */
    public function testEmptyListUserSessionExercises()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')->get('/api/v1/users/'.$user->id.'/get-user-sessions');
        $response->assertStatus(200);

    }
}
