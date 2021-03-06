<?php

namespace App\Http\Controllers;

use App\Events\ClientCreated;
use App\Http\Requests\StoreClient;
use File;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use View;

class ClientController extends Controller
{
    protected $file;

    /**
     * @return string
     */
    public function __construct()
    {
        $this->file = storage_path().'/csv/clientData.csv';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);

        $checkFile = File::exists($this->file);

        if (!$checkFile) {
            $writer = Writer::createFromPath($this->file, 'a');
            $writer->insertOne(['First Name', 'Last Name', 'DOB', 'Mobile', 'E-mail', 'Nationality', 'Address', 'Gender', 'Country',
                'City', 'State', 'Zip', 'Education', ]); //Inserting Header
        }

        $reader = Reader::createFromPath($this->file, 'r');
        $reader->setHeaderOffset(0);
        $stmt = (new Statement())
            ->offset(10 * ($page - 1))
            ->limit(10);

        $records = $stmt->process($reader);

        $data['count'] = count($reader);
        $data['page'] = $page;
        $data['records'] = $records->getRecords();

        View::share('title', 'Clients Listings');

        return view('clients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        View::share('title', 'Add Client');

        return view('clients.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClient $request)
    {
        $request->request->remove('_token');
        $request['education'] = json_encode($request->get('education'));
        $request['address'] = str_replace("\r\n", '', $request->get('address'));
        $array = $request->toArray();

        event(new ClientCreated($this->file, $array));

        return redirect()->back()->with('message', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
