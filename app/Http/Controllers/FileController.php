<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function userShow($userId, $type, $fileName)
    {
        $user = Auth::user(); 
        
        if (!preg_match('/^[\w\.-]+$/', $fileName)) {
            abort(404);
        }
        
        if ($user->isHR() || $user->id==$userId) {
            
            $path = storage_path('app/private/uploads/attachments/' . $userId  . '/' .  $type . '/' . $fileName);
            
            if (!file_exists($path)) {
                abort(404); 
            }
        } else abort(403);

        return Response::file($path);
    }

    public function hrShow($fileName)
    {
        
        if (!preg_match('/^[\w\.-]+$/', $fileName)) {
            abort(404);
        }
 
        $path = storage_path('app/public/uploads/vacancies/' . $fileName);
        
        if (!file_exists($path)) {
            abort(404); 
        }

        return Response::file($path);
    }
}