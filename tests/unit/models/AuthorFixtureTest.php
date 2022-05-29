<?php

namespace app\tests\unit\models;

use app\tests\fixtures\AuthorFixture;

class AuthorFixtureTest extends \Codeception\Test\Unit
{   
    public function _fixtures()
    {
        return [
            'profiles' => [
                'class' => AuthorFixture::class,
                // fixture data located in tests/_data/user.php
                'dataFile' => codecept_data_dir() . 'author.php'
            ],
        ];
    }
}