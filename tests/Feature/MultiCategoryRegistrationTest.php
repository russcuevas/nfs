<?php

namespace Tests\Feature;

use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class MultiCategoryRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_register_with_multiple_competition_categories()
    {
        $file = UploadedFile::fake()->create('receipt.jpg', 100, 'image/jpeg');

        $response = $this->post(route('register.store'), [
            'registration_type' => 'contestant',
            'name' => 'Chef Juan Dela Cruz',
            'school' => 'Batangas State University',
            'is_ublc' => '0',
            'contest_categories' => ['A.1', 'B.1', 'I.1'],
            'contest_divisions' => [
                'A.1' => 'student',
                'B.1' => 'professional',
            ],
            'email' => 'juan@example.com',
            'gcash_name' => 'Juan Dela Cruz',
            'gcash_number' => '09171234567',
            'reference_number' => 'REF987654321',
            'payment_screenshot' => $file,
        ]);

        $response->assertRedirect();
        
        $registration = Registration::where('email', 'juan@example.com')->first();
        $this->assertNotNull($registration);
        // A.1 student is 1000, B.1 professional is 1000, I.1 is 500 => Total = 2500
        $this->assertEquals(2500, $registration->ticket_price);
        $this->assertCount(3, $registration->categories_list);
        $this->assertEquals('3 Competition Categories', $registration->availed_summary);

        // Verify views render without errors
        $emailSubmittedHtml = view('emails.ticket_submitted', ['registration' => $registration])->render();
        $this->assertStringContainsString('KLASIKA MODERNA KULINARYA', $emailSubmittedHtml);
        $this->assertStringContainsString('REGIONAL BARTENDING', $emailSubmittedHtml);
        $this->assertStringContainsString('QUIZ-BEE', $emailSubmittedHtml);

        $emailStatusHtml = view('emails.ticket_status_updated', ['registration' => $registration])->render();
        $this->assertStringContainsString('KLASIKA MODERNA KULINARYA', $emailStatusHtml);

        $successHtml = view('guest.success', ['registration' => $registration])->render();
        $this->assertStringContainsString('Availed Competition Entries', $successHtml);

        $trackHtml = view('guest.track', ['registration' => $registration, 'searched' => true, 'query' => $registration->ticket_number])->render();
        $this->assertStringContainsString('Availed Competition Entries', $trackHtml);
    }

    public function test_can_register_with_global_student_division()
    {
        $file = UploadedFile::fake()->create('receipt.jpg', 100, 'image/jpeg');

        $response = $this->post(route('register.store'), [
            'registration_type' => 'contestant',
            'contest_division' => 'student',
            'name' => 'Maria Student',
            'school' => 'UB Lipa',
            'is_ublc' => '1',
            'contest_categories' => ['A.1', 'A.2', 'D.3'],
            'email' => 'maria@example.com',
            'gcash_name' => 'Maria Student',
            'gcash_number' => '09181234567',
            'reference_number' => 'REFSTUDENT123',
            'payment_screenshot' => $file,
        ]);

        $response->assertRedirect();
        
        $registration = Registration::where('email', 'maria@example.com')->first();
        $this->assertNotNull($registration);
        // A.1 student is 1000, A.2 student is 700, D.3 student is 500 => Total = 2200
        $this->assertEquals(2200, $registration->ticket_price);
        $this->assertCount(3, $registration->categories_list);
        $this->assertEquals('College and SHS', $registration->categories_list[0]['division']);
    }

    public function test_can_register_with_global_professional_division()
    {
        $file = UploadedFile::fake()->create('receipt.jpg', 100, 'image/jpeg');

        $response = $this->post(route('register.store'), [
            'registration_type' => 'contestant',
            'contest_division' => 'professional',
            'name' => 'Chef Gordon',
            'school' => 'Manila Culinary Institute',
            'is_ublc' => '0',
            'contest_categories' => ['A.1', 'A.2', 'D.3'],
            'email' => 'gordon@example.com',
            'gcash_name' => 'Gordon Ramsay',
            'gcash_number' => '09191234567',
            'reference_number' => 'REFPRO123',
            'payment_screenshot' => $file,
        ]);

        $response->assertRedirect();
        
        $registration = Registration::where('email', 'gordon@example.com')->first();
        $this->assertNotNull($registration);
        // A.1 pro is 1500, A.2 pro is 1000, D.3 pro is 700 => Total = 3200
        $this->assertEquals(3200, $registration->ticket_price);
        $this->assertCount(3, $registration->categories_list);
        $this->assertEquals('Professional', $registration->categories_list[0]['division']);
    }
}

