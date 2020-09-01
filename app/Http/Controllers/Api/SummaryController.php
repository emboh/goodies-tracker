<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SummaryService;
use Illuminate\Http\Response;

class SummaryController extends Controller
{
    protected $summary;

    /**
     * @param  \SummaryService  $summaryService
     */
    public function __invoke(SummaryService $summaryService)
    {
        $this->summaryService = $summaryService;

        $queryA = $this->summaryService->queryA();

        $queryB = $this->summaryService->queryB();

        return response()->json([
            'queryA' => $queryA,
            'queryB' => $queryB,
        ], Response::HTTP_OK);
    }
}
