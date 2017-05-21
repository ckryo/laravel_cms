<?php

namespace Ckryo\Laravel\Cms\Controllers;

use App\Http\Controllers\Controller;
use Ckryo\Laravel\Cms\Models\CmsArticle;

abstract class CmsController extends Controller
{

    protected $type = 'news';

    function index () {
        $result = CmsArticle::with('author')->where('type', $this->type)->orderBy('created_at', 'desc')->paginate(10);
        return response()->page($result);
    }

}