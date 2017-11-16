<?php

namespace Tests\Feature;

use File;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use Tests\TestCase;

class ClientCreateTest extends TestCase
{
    protected $file;

    public function isWritableTest()
    {
        echo 'Check File Exist...'."\n";

        $this->assertFileExists($this->file);
    }

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

        dd($this->post('/clients', $data)->dump());

        $r = $this->post('/clients', $data)
            ->assertStatus(302);
    }

    public function testDataSaved()
    {
        echo 'Testing Client form data saved in file ...'."\n";
        $reader = Reader::createFromPath($this->file, 'r');
        $reader->setHeaderOffset(0);
        $count = count($reader);
        if ($count < 1) {
            $count = 1;
        }
        $stmt = (new Statement())
            ->offset($count - 1)
            ->limit(1);

        $records = $stmt->process($reader);
        $records = $records->getRecords()->current();

        $this->assertEquals('Ranjeet', $records['First Name']);
        unlink($this->file);
    }

    protected function setUp()
    {
        parent::setUp();
        echo 'Testing ...'."\n";
        $this->file = storage_path().'/csv/clientData.csv';
        $checkFile = File::exists($this->file);

        if (!$checkFile) {
            $writer = Writer::createFromPath($this->file, 'a');
            $writer->insertOne(['First Name', 'Last Name', 'DOB', 'Mobile', 'E-mail', 'Nationality', 'Address', 'Gender', 'Country',
                'City', 'State', 'Zip', 'Education', ]); //Inserting Header
        }

        if (File::exists($this->file)) {
            dd('hfkjhfk');
        }
    }
}
