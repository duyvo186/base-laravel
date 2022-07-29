<?php

namespace App\Http\Service\CrawlerData;

use App\Http\Service\Observe;
use Spatie\Crawler\Crawler;
use GuzzleHttp\RequestOptions;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class CrawService
{
    public function startCrawl($request)
    {
            Crawler::create([RequestOptions::ALLOW_REDIRECTS => true, RequestOptions::TIMEOUT => 30])
                ->acceptNofollowLinks()
                ->ignoreRobots()
                // ->setParseableMimeTypes(['text/html', 'text/plain'])
                ->setCrawlObserver(new Observe())
                ->setCrawlProfile(new CrawlInternalUrls('https://webcaycanh.com/tin-tuc/'))
                ->setMaximumResponseSize(1024 * 1024 * 2) // 2 MB maximum
                ->setTotalCrawlLimit(100) // limit defines the maximal count of URLs to crawl
                // ->setConcurrency(1) // all urls will be crawled one by one
                ->setDelayBetweenRequests(100)
                ->startCrawling('https://webcaycanh.com/tin-tuc/');
    }

}
