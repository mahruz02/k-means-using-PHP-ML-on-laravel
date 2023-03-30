<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;

class CustomKMeans extends KMeans
{
    protected $initialCenters;

    public function __construct(int $k, array $initialCenters)
    {
        parent::__construct($k);

        $this->initialCenters = $initialCenters;
    }

    protected function initializeCenters(array $samples): array
    {
        return $this->initialCenters;
    }
}

class KmeansController extends Controller
{   
    public function cluster(array $samples): array
    {
        $this->initialize($samples);

        while (true) {
            $clusters = $this->assignSamples($samples);
            $newCenters = $this->updateCenters($clusters);

            // Display the intermediate results of this iteration
            echo "Iteration: " . PHP_EOL;
            print_r($clusters);

            if ($this->isConverged($newCenters)) {
                break;
            }
        }

        return $clusters;
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        
        //
        
            $data = [
                [98 ,86 ,74	,92],
                [88	,76	,94	,82],
                [78	,96	,94	,72],
                [98	,96	,94	,92],
                [88	,86	,84	,82],
                [78	,76	,74	,72],
                [98	,76	,94	,92],
                [88	,96	,94	,92],
                [78	,86	,94	,92],
                [78	,96	,84	,82],
                [98	,96	,74	,72],
                [88	,76	,84	,92],
                [88	,76	,74	,82],
                [78	,86	,74	,92],
                [98	,86	,94	,72],
                [88	,96	,74	,82],
                [78	,96	,84	,92],
                [98	,86	,84	,72],
                [78	,76	,94	,92],
                [88	,86	,74	,72],
                [88	,86	,94	,92],
                [98	,96	,84	,82],
                [98	,76	,94	,72],
                [78	,76	,84	,82],
                [88	,86, 94, 92],
            ];
            $initialCenters = [
            [98, 96	,94	,92],
            [88, 86	,84	,82],
            [78, 76	,74	,72],
            ];
            $kmeans = new CustomKMeans(3, $initialCenters);
            $clusters = $kmeans->cluster($data);
            // dd($clusters);
            return view('kmeans.index', compact('clusters'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
