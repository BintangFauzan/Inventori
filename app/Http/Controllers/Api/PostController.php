<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\barang;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
        $user = User::all();

        return new PostResource(true, 'List Data User', $user);
    }
}
