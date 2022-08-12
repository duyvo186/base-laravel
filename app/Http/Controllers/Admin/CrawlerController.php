<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\CrawlerData\CrawService;
use App\Models\Crawler;
use Illuminate\Http\Request;

class CrawlerController extends Controller
{
    protected $crawService;

    /**
     * @param $crawService
     */
    public function __construct(CrawService $crawService)
    {
        $this->crawService = $crawService;
    }

    public function index()
    {
        return view('admin/crawler/index')->with('items', Crawler::orderBy('status','asc')->get());
    }
    public function store(Request $request)
    {
           $result = $this->crawService->startCrawl($request);
           dd($result);
    }
    //
}
