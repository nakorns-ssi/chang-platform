<?php
use App\helper\util;
use App\helper\helper_lang;
use App\Models\chang_prompt\Posts;
use App\Models\chang_prompt\Data_meta;
if (!isset($mode)) {
    $mode = null;
}
$model = null;
$Data_meta = Data_meta::where([
    'tag' => 'worker_profile',
    'account_id' => $account_id,
])->get();

foreach ($Data_meta as $val) {
    $model[$val->meta_key][] = $val->meta_value;
}
$worker_profile = $model;
$posts_type = 'worker_history';
$work_history = new Posts();
$work_history = $work_history->select('posts.*', DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url'), DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key'));
$work_history = $work_history
    ->where([
        'posts.status' => 'y',
        'posts.posts_type' => $posts_type,
        'posts.account_id' => $account_id,
    ])
    ->orderby('posts.updated_at', 'desc')
    ->limit(4)
    ->get();
$posts_type = 'worker_project';
$work_project = new Posts();
// $model =  $model->RightJoin('upload', 'posts.id', '=', 'upload.posts_id') ;
$work_project = $work_project->select('posts.*', DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url'), DB::raw('(select count(id) from upload where status = "y" and upload.posts_id = posts.id )  as img_count'));
$work_project = $work_project
    ->where([
        'posts.status' => 'y',
        'posts_type' => $posts_type,
        'posts.account_id' => $account_id,
    ])
    ->orderby('updated_at', 'desc')
    ->limit(4)
    ->get();
?>

<section class="  ">
    <div class="container ">

        <div class="row mt-2 g-2">
            <div class="col-sm-12">
                <div class=" card px-4 p-2 bg-white border rounded-4">
                    <div class="row justifu-content-start align-items-center">
                        <div class="col-10  ">
                            @if ($mode == 'edit')
                                <a href="/manage/worker/worker_history">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i> ประวัติการทำงาน
                                    </div>
                                </a>
                            @else
                                <div class="h4 text-nowrap pl-3">
                                    ประวัติการทำงาน
                                </div>
                            @endif
                            <div class="row justifu-content-center">
                                @foreach ($work_history as $key => $value)
                                    <?php
                                    $dataJson = json_encode([
                                        '_key' => $value->posts_key,
                                    ]);
                                    ?>
                                    <div class=" col-sm-8 col-md-8  my-1 ">
                                        <div
                                            class="row py-2 px-3  border rounded-4 d-flex aligh-items-center justify-content-between bg-white">
                                            <div class="col-12 py-2 justify-content-between">
                                                <span class="h6 my-2">
                                                    {{ util::thai_date_short($value->start_date) }} -
                                                    {{ util::thai_date_short($value->end_date) }}
                                                </span>
                                            </div>
                                            <div class="col-12  ps-3">
                                                <div class="p-2 bg-light rounded-2 ">{!! nl2br($value->posts_content) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class=" card px-4 p-2 bg-white border rounded-4">
                    <div class="row justifu-content-start align-items-center">
                        <div class=" col-sm-12 ">
                            @if ($mode == 'edit')
                                <a href="/manage/worker/worker_project">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i> ผลงาน
                                    </div>
                                </a>
                            @else
                                <div class="h4 text-nowrap pl-3">
                                    ผลงาน
                                </div>
                            @endif
                            <div class="container">
                                <div class="d-flex align-content-start flex-wrap">
                                    @foreach ($work_project as $key => $value)
                                        <a href="/worker_project/{{ $value->posts_key }}" target="_blank" >
                                            <div class="card my-2 mx-1"
                                                style="width: 180px; height: 180px; overflow: hidden;">
                                                <!-- The background image -->
                                                <div class="card__thumbnail">
                                                    <img src="{{ $value->img_thumbnail_url }}">
                                                </div>
                                                <div class="card-footer ">
                                                    <div class="  text-truncate" style="max-width: 150px;">
                                                        {{ $value->posts_title }}

                                                    </div>
                                                    <span class="fw-light "
                                                        style="color:#aaaaaa">{{ $value->img_count }} รูป</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class=" card px-4 p-2 bg-white border rounded-4">
                    <div class="row justifu-content-start align-items-center">
                        <div class=" col-sm-12 ">
                            @if ($mode == 'edit')
                                <a href="/manage/worker/worker_skill">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i> ความสามารถ
                                    </div>
                                </a>
                            @else
                                <div class="h4 text-nowrap pl-3">
                                    ความสามารถ
                                </div>
                            @endif
                        </div>
                        <div class=" col-sm-6 ">
                            <div class="h6 text-nowrap pl-3">
                                ประเภทงาน
                            </div>
                            <div class="col-sm-12 my-2">
                                <div class="d-block p-2   ">
                                    @foreach ($worker_profile['work_category'] as $key => $item)
                                        <span class="badge text-bg-warning fw-light me-1 ">#{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class=" col-sm-6 ">
                            <div class="h6 text-nowrap pl-3">
                                ประเภทงานย่อย
                            </div>
                            <div class="col-sm-12 my-2">
                                <div class="d-block p-2   ">
                                    @foreach ($worker_profile['work_sub_category'] as $key => $item)
                                        <span class="badge text-bg-warning fw-light me-1 ">#{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class=" col-sm-6 ">
                            <div class="h6 text-nowrap pl-3">
                                ทักษะ
                            </div>
                            <div class="col-sm-12 my-2">
                                <div class="d-block p-2   ">
                                    @foreach ($worker_profile['skill'] as $key => $item)
                                        <span class="badge text-bg-warning fw-light me-1 ">#{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class=" col-sm-6 ">
                            <div class="h6 text-nowrap pl-3">
                                สินค้า
                            </div>
                            <div class="col-sm-12 my-2">
                                <div class="d-block p-2   ">
                                    @foreach ($worker_profile['product'] as $key => $item)
                                        <span class="badge text-bg-warning fw-light me-1 ">#{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>

<style>
    h3 {
        color: #f1f1f1;
    }

    .content {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        /* Fallback color */
        background: rgba(0, 0, 0, 0.4);
        /* Black background with 0.4 opacity */
        color: #f1f1f1;
        width: 100%;
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 0;
    }

    .card__title {
        /* Just for styling */
        align-self: flex-end;
        padding: 0.5rem;
        color: rgba(255, 255, 255, .90);
        font-size: 1rem;
        line-height: 1.1;
        background: #433d3d8c;
        width: 100%;
    }

    /* Styles for:
    ** - Using IMG tag inside a container
    ------------------------------------------ */
    /* The image container */
    .card__thumbnail {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: center;
        /* horizontal center */
        align-items: center;
        /* vertical center */

        width: 100%;
        /* Thumbnail dimensions. */
        height: 100%;
        /*** Change the height to make the image smaller ***/
        /* background-color: rgba(0,0,0,.2);  /* for debugging */

    }

    /* Sets the image dimensions */
    .card__thumbnail>img {
        /* Tip: use 1:1 ratio images */
        height: 100%;
        /* or width when img.width > img.height */
    }

    /* Styles the title inside the img container */
    .card__thumbnail>.card__title {
        /* Just for styling */
        position: absolute;
        left: 0;
        bottom: 0;
    }
</style>
