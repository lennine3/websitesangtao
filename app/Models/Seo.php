<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    // public const TYPE_PRODUCT = 1;
    // public const TYPE_CATE = 2;
    public const BLOG_CATE = 1;
    public const BLOG = 2;

    use HasFactory;
    protected $table = "seo";
    protected $guarded = [];
}
