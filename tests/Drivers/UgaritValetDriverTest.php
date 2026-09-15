<?php

use Valet\Drivers\UgaritValetDriver;

class UgaritValetDriverTest extends BaseDriverTestCase
{
    public function test_it_serves_ugarit_projects()
    {
        $driver = new UgaritValetDriver;

        $this->assertTrue($driver->serves($this->projectDir('ugarit'), 'my-site', '/'));
    }

    public function test_it_doesnt_serve_non_ugarit_projects_with_public_directory()
    {
        $driver = new UgaritValetDriver;

        $this->assertFalse($driver->serves($this->projectDir('public-with-index-non-ugarit'), 'my-site', '/'));
    }

    public function test_it_gets_front_controller()
    {
        $driver = new UgaritValetDriver;

        $projectPath = $this->projectDir('ugarit');
        $this->assertEquals($projectPath.'/public/index.php', $driver->frontControllerPath($projectPath, 'my-site', '/'));
    }
}
