<?php

namespace Tests\Unit;

use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class UploadTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $operations = [
            'operationName' => 'upload',
            'query' => 'mutation upload ($file: Upload!) {
                            upload (file: $file)
                        }',
            'variables' => [
                'file' => null,
            ],
        ];
        
        $map = [
            '0' => ['variables.file'],
        ];
        
        $file = [
            '0' => UploadedFile::fake()->create('test.pdf', 500),
        ];
        
        $this->multipartGraphQL($operations, $map, $file);
    }
}
