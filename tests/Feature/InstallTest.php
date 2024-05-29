<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class InstallTest extends TestCase
{
    private string $path;

    public function setUp(): void
    {
        parent::setUp();

        $this->path = __DIR__.'/../laravel';

        $this->app->setBasePath($this->path);
        File::deleteDirectory($this->path);
        File::ensureDirectoryExists($this->path);
    }

    public function tearDown(): void
    {
        File::deleteDirectory($this->path);

        parent::tearDown();
    }

    /**
     * @return void
     */
    public function test_vercel_install()
    {
        $this->artisan('vercel:install')
             ->assertSuccessful()
             ->expectsOutput('Vercel resources installed successfully.');

        $this->assertFileExists(base_path('vercel.json'));
        $this->assertFileExists(base_path('.vercelignore'));
        $this->assertFileExists(base_path('api/index.php'));
    }
}
