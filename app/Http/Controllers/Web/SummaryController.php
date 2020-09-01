<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\SummaryService;

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

        return view('summary.index', compact('queryA', 'queryB'));
    }
}
