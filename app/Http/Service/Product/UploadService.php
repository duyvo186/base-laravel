<?php

namespace App\Http\Service\Product;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'upload/' . date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                return '/public/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
    }
}
