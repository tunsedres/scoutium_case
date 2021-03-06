<?php


namespace Tests\Feature;


use App\Mail\InviteCreated;
use App\Models\User;
use App\Models\UserInvitation;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class InvitationTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_send_invitation()
    {
        $userInvitation = UserInvitation::factory()->create();

        $mailable = new InviteCreated($userInvitation);

        $mailable->assertSeeInHtml($userInvitation->code);

        $mailable->assertSeeInHtml('Someone has invited you to be a scoutium member');

    }

    public function test_send_invitaton_code_with_email()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->postJson('/api/send-invitation', [
            'email' => 'test@test.com'
        ]);

        $response->assertStatus(201);
    }

    public function test_get_error_send_invitaton_code_without_email()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->postJson('/api/send-invitation', [
            'email' => ''
        ]);

        $response->assertStatus(422);
    }

}
