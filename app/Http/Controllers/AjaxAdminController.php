<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\PricingTable;
use Illuminate\Support\Arr;
use App\Models\SectionInfo;
use App\Models\UiDesign;
use App\Libraries\Upload;
use App\Models\Benefit;
use App\Models\DesignService;

class AjaxAdminController extends Controller
{
    private $upload;
    public function __construct()
    {
        $this->upload=new Upload();
    }
    public function processSectionInfo(Request $request)
    {
        $benefitInfo=SectionInfo::find($request->sectionInfo_id);
        // dd($benefitInfo);
        $benefitInfo->update($request->except('sectionInfo_id'));
        return response()->json(['message' => 'Dữ liệu đã thay đổi']);
    }
    public function processUiDesign()
    {
        $inputs = request()->except(['_token']);
        $data=Arr::only($inputs, ['name','link']);
        $UiDesign = isset($inputs['UiDesign_id']) && $inputs['UiDesign_id'] ? UiDesign::findOrFail($inputs['UiDesign_id']) : UiDesign::create($data);
        if (request()->hasFile('uiDesignImage')) {
            $file = request('uiDesignImage');
            $image_path = 'UiDesign'.'/'.$UiDesign->id.'/';
            $size=[550,360];

            $result=$this->upload->doUpload($image_path, $file, "", $size);
            $imageName = $result['name'];
            $webpImageName=$result['webp_name'];
            $UiDesign->image = $imageName;
            $UiDesign->webp_image = $webpImageName;
            $UiDesign->save();
        }
        $uiDesignList=UiDesign::get();
        $html = view('admin.home.UiDesign.UiDesignList', compact('uiDesignList'))->render();
        return response()->json(['message' => 'Trạng thái đã thay đổi','html'=>$html]);
    }

    public function processUiDesignStatus()
    {
        $inputs = request()->except(['_token']);
        $data=Arr::only($inputs, ['UiDesign_id','name', 'link']);
        // dd($inputs);
        $UiDesign=UiDesign::find($data['UiDesign_id']);
        $UiDesign->status=='A' ? $UiDesign->status='D' : $UiDesign->status='A';
        $UiDesign->save();
        $uiDesignList=UiDesign::get();
        $html = view('admin.home.UiDesign.UiDesignList', compact('uiDesignList'))->render();
        return response()->json(['message' => 'Trạng thái đã thay đổi','html'=>$html]);
    }

    public function processBenefit(){
        $inputs = request()->except(['_token']);
        $data=Arr::only($inputs, ['title', 'content']);
        $serviceBenefit=Benefit::find($inputs['serviceBenefit_id']);
        $serviceBenefit->update($data);
        return response()->json(['message' => 'Dữ liệu đã thay đổi']);
    }

    public function processWebDesign(){
        $inputs = request()->except(['_token']);
        $data=Arr::only($inputs, ['title', 'content']);
        $serviceBenefit=DesignService::find($inputs['webDesign_id']);
        $serviceBenefit->update($data);
        return response()->json(['message' => 'Dữ liệu đã thay đổi']);
    }
}
