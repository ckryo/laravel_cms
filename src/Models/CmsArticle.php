<?php
/**
 * Created by PhpStorm.
 * User: liurong
 * Date: 2017/5/19
 * Time: 下午5:05
 */

namespace Ckryo\Laravel\Cms\Models;

use Illuminate\Database\Eloquent\Model;

class CmsArticle extends Model
{

    protected $table = 'cms_articles';
    protected $connection = 'mysql';

    protected $fillable = ['title', 'content', 'type', 'previews', 'org_id'];

}