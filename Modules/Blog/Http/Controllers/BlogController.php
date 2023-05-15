<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\Blog;
use Illuminate\Support\Arr;
use App\Libraries\Upload;
use App\Models\Seo;
use App\Models\SlugOptimize;
use Illuminate\Support\Facades\Auth;
use function App\Libraries\StripSlug;

class BlogController extends Controller
{
    private $upload;
    private $slug_optimize;
    public function __construct()
    {
        $this->upload=new Upload();
        $this->slug_optimize= new SlugOptimize();
    }
    public function blogCategory()
    {
        $blogCategory=BlogCategory::all();
        return view('blog::blogCategory.index', compact('blogCategory'));
    }
    public function blogCategoryDetail(BlogCategory $blogCategory)
    {
        $blogCategoryList=BlogCategory::all();
        return view('blog::blogCategory.blog-category', compact('blogCategory', 'blogCategoryList'));
    }
    public function blogCategoryDetailEdit(BlogCategory $blogCategory)
    {
        $blogCategoryList=BlogCategory::all();
        return view('blog::blogCategory.blog-category', compact('blogCategory', 'blogCategoryList'));
    }
    public function blogCategoryProcess()
    {
        $inputs = request()->except(['_token']);
        $slug=StripSlug($inputs['title_short']);
        $data=Arr::only($inputs, ['title','title_short', 'description', 'parent_id', 'status']);
        $data['slug']=$slug;
        $seoData=Arr::only($inputs, ['seo_title','seo_description','seo_keyword']);
        $seo = Seo::updateOrCreate(['object_id' => $inputs['blog_cate_id'], 'type' => Seo::BLOG_CATE], $seoData);
        $blogCategory= $inputs['blog_cate_id'] ? BlogCategory::findOrFail($inputs['blog_cate_id']) : BlogCategory::create($data);
        if ($inputs['blog_cate_id']) {
            $blogCategory->update($data);
        }

        // createOrUpdate Slug
        $this->slug_optimize->updateOrCreate(['object_id' => $blogCategory->id, 'type' => SlugOptimize::TYPE_BLOG_CATE], ['slug' => $slug]);

        return response()->json([
            'success' => true,
            'message' => 'Blog category đã được thay đổi',
        ]);
    }
    public function index()
    {
        $blogList=Blog::all();
        return view('blog::blog.index', compact('blogList'));
    }

    public function create()
    {
        $blogCategoryList=BlogCategory::where('status', 'A')->get();
        return view('blog::blog.create', compact('blogCategoryList'));
    }

    public function store()
    {
        $imageName='';
        $webpImageName='';

        $inputs = request()->except(['_token']);
        $slug=StripSlug($inputs['title']);
        $data=Arr::only($inputs, ['title', 'description', 'content', 'priority', 'status','blog_category_id']);
        $seoData=Arr::only($inputs, ['seo_title','seo_description','seo_keyword']);
        $data['slug']=$slug;
        $data['user_id']=Auth::user()->id;
        $blog= $inputs['blog_id'] ? Blog::findOrFail($inputs['blog_id']) : Blog::create($data);
        $seo = Seo::updateOrCreate(['object_id' => $inputs['blog_id'], 'type' => Seo::BLOG], $seoData);
        if (request()->hasFile('blogImage')) {
            $file = request()->file('blogImage');
            $source_path = config('blog.image.image_save_path').'/'.$blog->id.'/';
            $result=$this->upload->doUploadBlog($source_path, $file, "", [405, 250]);
            $image=$blog->image;
            $webp_image=$blog->webp_path;

            if (isset($image) && (file_exists($source_path . "/" . $image) == '1')) {
                unlink($source_path . "/" . $image);
            }
            if (isset($webp_image) && (file_exists($source_path . "/" . $webp_image) == '1')) {
                unlink($source_path . "/" . $webp_image);
            }
            $imageName = $result['name'];
            $webpImageName=$result['webp_name'];
        }
        if ($imageName) {
            $data['image'] = $imageName;
        }
        if ($webpImageName) {
            $data['webp_path'] = $webpImageName;
        }
        $blog->update($data);

        // createOrUpdate Slug
        $this->slug_optimize->updateOrCreate(['object_id' => $blog->id, 'type' => SlugOptimize::TYPE_BLOG], ['slug' => $slug]);


        return response()->json([
            'success' => true,
            'message' => 'Blog đã được thay đổi',
        ]);
    }

    public function edit(Blog $blog)
    {
        $blogCategoryList=BlogCategory::where('status', 'A')->get();
        return view('blog::blog.create', compact('blogCategoryList', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
