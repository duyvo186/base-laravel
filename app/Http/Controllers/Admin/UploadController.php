<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Product\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $upload;
    /**
     * @param $upload
     */
    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $url = $this->upload->store($request);
        if ($url !== false) {
            return response()->json([
                'success' => [
                    'deleteSuccess' => 'Delete Success'
                ],
                'url' => $url,
            ]);
        }
        return redirect()->route('admin.product.index');
    }
}
