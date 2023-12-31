<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CourseSessionsTest extends TestCase
{
    /**
     * Test to fetch user's sessions list
     *
     * @return void
     */
    public function testListUsersCourseSessions()
    {
        $user = User::find(1);

        $this->actingAs($user, 'api')
                    ->get('/api/v1/users/1/get-user-sessions')
                    ->assertStatus(200)
                    ->assertJson($this->getTestData());

        $this->assertAuthenticatedAs($user);
    }

    private function getTestData(){
        $data = [
            "success" => true,
            "data" => [
                "history" => [
                    [
                        "user_name" => "Testcase User",
                        "name" => "Qaulity Assurance",
                        "id" => 12,
                        "user_id" => 1,
                        "course_id" => 5,
                        "score" => 62,
                        "status" => "In Progress",
                        "created_at" => 1576161160,
                        "updated_at" => 1576161160,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Content Writer",
                        "id" => 11,
                        "user_id" => 1,
                        "course_id" => 4,
                        "score" => 61,
                        "status" => "In Progress",
                        "created_at" => 1576074760,
                        "updated_at" => 1576074760,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Content Writer",
                        "id" => 10,
                        "user_id" => 1,
                        "course_id" => 4,
                        "score" => 60,
                        "status" => "In Progress",
                        "created_at" => 1575988360,
                        "updated_at" => 1575988360,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Content Writer",
                        "id" => 9,
                        "user_id" => 1,
                        "course_id" => 4,
                        "score" => 59,
                        "status" => "In Progress",
                        "created_at" => 1575901960,
                        "updated_at" => 1575901960,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "UI/UX Designer",
                        "id" => 8,
                        "user_id" => 1,
                        "course_id" => 3,
                        "score" => 58,
                        "status" => "In Progress",
                        "created_at" => 1575815560,
                        "updated_at" => 1575815560,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "UI/UX Designer",
                        "id" => 7,
                        "user_id" => 1,
                        "course_id" => 3,
                        "score" => 57,
                        "status" => "In Progress",
                        "created_at" => 1575729160,
                        "updated_at" => 1575729160,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "UI/UX Designer",
                        "id" => 6,
                        "user_id" => 1,
                        "course_id" => 3,
                        "score" => 56,
                        "status" => "In Progress",
                        "created_at" => 1575642760,
                        "updated_at" => 1575642760,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Mobile Develoment",
                        "id" => 5,
                        "user_id" => 1,
                        "course_id" => 2,
                        "score" => 55,
                        "status" => "In Progress",
                        "created_at" => 1575556360,
                        "updated_at" => 1575556360,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Mobile Develoment",
                        "id" => 4,
                        "user_id" => 1,
                        "course_id" => 2,
                        "score" => 54,
                        "status" => "In Progress",
                        "created_at" => 1575469960,
                        "updated_at" => 1575469960,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Mobile Develoment",
                        "id" => 3,
                        "user_id" => 1,
                        "course_id" => 2,
                        "score" => 53,
                        "status" => "In Progress",
                        "created_at" => 1575383560,
                        "updated_at" => 1575383560,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Web Develoment",
                        "id" => 2,
                        "user_id" => 1,
                        "course_id" => 1,
                        "score" => 52,
                        "status" => "In Progress",
                        "created_at" => 1575297160,
                        "updated_at" => 1575297160,
                        "total_exercises" => 4
                    ],
                    [
                        "user_name" => "Testcase User",
                        "name" => "Web Develoment",
                        "id" => 1,
                        "user_id" => 1,
                        "course_id" => 1,
                        "score" => 51,
                        "status" => "In Progress",
                        "created_at" => 1575210760,
                        "updated_at" => 1575210760,
                        "total_exercises" => 3
                    ]
                ]
            ],
            "meta" => [
                "row_count" => 12,
                "message" => "Total 12 record(s) found",
            ]
        ];

        return $data;
    }


    /**
     * Test to fetch user's empty sessions list
     *
     * @return void
     */
    public function testEmptyListUsersCourseSessions()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')->get('/api/v1/users/'.$user->id.'/get-user-sessions');
        $response->assertStatus(200);

    }
}
