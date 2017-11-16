<?php

namespace Tests\Feature;

use File;
use League\Csv\Reader;
use League\Csv\Statement;
use Tests\TestCase;

class ClientCreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testClientFormSave()
    {
        echo 'Testing Client form submission...'."\n";

        $data = [
            '_token'      => csrf_token(),
            'first_name'  => 'Ranjeet',
            'last_name'   => 'Singh',
            'dob'         => '11/08/2017',
            'mobile'      => '8750988712',
            'email'       => 'ranjeetsingh867@gmail.com',
            'nationality' => 'India',
            'gender'      => 'Female',
            'address'     => 'G-3/253A STREET NO.3, 5TH PUSTA↵SONIA VIHAR, DELHI POLICE SIDE',
            'city'        => 'DELHI',
            'state'       => 'DELHI',
            'zip'         => '11OO94',
            'country'     => 'India',
            'education'   => [
                [
                    'college' => 'Hindu College',
                    'degree'  => 'B.Sc',
                    'year'    => '1991',
                ],
            ],
        ];

        $r = $this->post('/clients', $data)
            ->assertStatus(302);
    }

    public function testDataSaved()
    {
        sleep(15);

        echo 'Testing Client form data saved in file ...'."\n";

        $file = storage_path().'/csv/clientData.csv';

        $reader = Reader::createFromPath($file, 'r');
        $reader->setHeaderOffset(0);
        $count = count($reader);
        $stmt = (new Statement())
            ->offset($count - 1)
            ->limit(1);

        $records = $stmt->process($reader);
        $records = $records->getRecords()->current();

        $this->assertEquals('Ranjeet', $records['First Name']);
    }
}
