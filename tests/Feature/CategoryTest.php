<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Category, User};

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_upload_a_category_successfully()
    {
        // Тест на успешное добавление категории
        $adminUser = User::factory()->admin()->create();

        $this->actingAs($adminUser);

        $data = [
            'name' => 'New Category',
        ];
        $response = $this->post(route('category.upload'), $data);
        $this->assertCount(1, Category::all());
        $this->assertEquals('New Category', Category::first()->name);

        $response->assertRedirect();
    }

    /** @test */
    public function it_fails_to_upload_a_category_without_name()
    {
        // Тест на ошибку добавления категории (Ошибка валидации)
        $adminUser = User::factory()->admin()->create();
        $this->actingAs($adminUser);

        $data = [
            'name' => '',
        ];
        $response = $this->post(route('category.upload'), $data);
        $this->assertCount(0, Category::all());
        $response->assertSessionHasErrors(['name']);

        $response->assertRedirect();
    }

    /** @test */
    public function it_fails_to_upload_a_category_as_non_admin()
    {
        // Тест на ошибку добавление категории (Не админ)
        $nonAdminUser = User::factory()->create();
        $this->actingAs($nonAdminUser);

        $data = [
            'name' => 'New Category',
        ];
        $response = $this->post(route('category.upload'), $data);
        $this->assertCount(0, Category::all());

        $response->assertStatus(404);
    }
}
