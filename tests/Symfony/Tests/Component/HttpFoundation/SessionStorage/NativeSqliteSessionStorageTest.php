<?php

namespace Symfony\Tests\Component\HttpFoundation\SessionStorage;

use Symfony\Component\HttpFoundation\SessionStorage\NativeSqliteSessionStorage;
use Symfony\Component\HttpFoundation\SessionAttribute\AttributeBag;
use Symfony\Component\HttpFoundation\SessionFlash\FlashBag;

/**
 * Test class for NativeSqliteSessionStorage.
 *
 * @author Drak <drak@zikula.org>
 *
 * @runTestsInSeparateProcesses
 */
class NativeSqliteSessionStorageTest extends \PHPUnit_Framework_TestCase
{
    public function testSaveHandlers()
    {
        if (!extension_loaded('sqlite')) {
            $this->markTestSkipped('Skipped tests SQLite extension is not present');
        }

        $storage = new NativeSqliteSessionStorage(sys_get_temp_dir().'/sqlite.db', array('name' => 'TESTING'));
        $this->assertEquals('sqlite', ini_get('session.save_handler'));
        $this->assertEquals(sys_get_temp_dir().'/sqlite.db', ini_get('session.save_path'));
        $this->assertEquals('TESTING', ini_get('session.name'));
    }
}

