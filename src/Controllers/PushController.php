<?php

namespace Ckryo\Laravel\Cms\Controllers;

use App\Http\Controllers\Controller;
use Ckryo\Laravel\Admin\Auth;
use Ckryo\Laravel\Cms\Models\CmsArticle;
use Illuminate\Http\Request;
// 用于文件、附件上传
class PushController extends Controller
{

    function store(Request $request, Auth $auth) {
        $this->validate($request, [
            'title' => "required",
            'content' => "required"
        ], [
            'title.required' => '标题不能为空',
            'content.required' => '内容不能为空',
        ]);

        db_transaction(function () use ($request, $auth) {
            $admin = $auth->user();
            $art = CmsArticle::create([
                'title' => $request->title,
                'content' => $request->content,
                'type' => $request->type,
                'previews' => $request->previews,
                'org_id' => $admin->org_id
            ]);

            logi($admin->id, 'cms_article', $art->id, 'create:'.$request->type, '发布了文章:'.$request->title, json_encode($request->all(), JSON_UNESCAPED_UNICODE));
        });

        return response()->ok('发布成功', '/cms/'.$request->type);
    }

}