<?php




Route::get('/a',['',function () {

    return \App\Deal::available()->get();
}]);
Route::group(['middleware' => 'web','domain'=>env('ADMIN_DOMAIN','admin.cp.dev')] , function(){
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group( ['middleware' => ['auth','admin']],function () {

    Route::get('/home', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);
    Route::get('/', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);


    Route::group( [ 'prefix'=>'metas'],function () {
        Route::get('deal/{id}/{k}', [
            'uses' => 'MetaController@setDeal'
        ]);
    });

    Route::get('/goods', [
        'as' => 'goods', 'uses' => 'GoodsController@index'
    ]);

    Route::get('/transactions', [
        'as' => 'transactions', 'uses' => 'TransactionsController@index'
    ]);

    Route::resource('categories', 'CategoriesController');
    Route::resource('stories', 'StoriesController');
    Route::resource('goods', 'GoodsController');
    Route::resource('deals', 'DealsController');
    Route::resource('messages', 'MessagesController');
    Route::resource('pages', 'PagesController');


});

});

Route::group(['namespace'=>'Frontend','middleware'=>'web'], function() {

    Route::auth();

    Route::get('/blog/{id}',[
        'as' => 'home.user.blog', 'uses' => 'BlogController@showUser'
    ]);

    Route::get('/blog/{userid}/{postid}',[
        'as' => 'home.user.blog', 'uses' => 'BlogController@showBlog'
    ]);

    Route::get('/reg/{id}', 'Auth\AuthController@registerByReferrer');

    Route::group( [ 'middleware' => ['auth'],'prefix'=>'user'],function () {
        Route::get('/dashboard', [
            'as' => 'home.user.dashboard', 'uses' => 'DashboardController@index'
        ]);

        Route::get('/statistics',[
            'as' => 'home.user.statistics', 'uses' => 'DashboardController@getStats'
        ]);

        Route::get('/blog',[
            'as' => 'home.user.blog', 'uses' => 'BlogController@index'
        ]);
        Route::get('/blog/new',[
            'as' => 'home.user.blog', 'uses' => 'BlogController@create'
        ]);
        Route::post('/blog/new',[
            'as' => 'home.user.blog', 'uses' => 'BlogController@store'
        ]);
        Route::get('/blog/edit/{id}',[
            'as' => 'home.user.blog', 'uses' => 'BlogController@edit'
        ]);
        Route::put('/blog/edit/{id}',[
            'as' => 'home.user.blog', 'uses' => 'BlogController@update'
        ]);

        Route::delete('/blog/{id}',[
            'as' => 'home.user.blog.delete', 'uses' => 'BlogController@destroy'
        ]);

    });
    Route::get('/', [
        'as' => 'home', 'uses' => 'HomeController@extrabux'
    ]);

    Route::get('/category/{slug}', [
        'as' => 'home', 'uses' => 'HomeController@category'
    ]);
    Route::get('/home/contactus', [
        'as' => 'home', 'uses' => 'HomeController@getContactus'
    ]);

    Route::post('/home/contactus', [
        'as' => 'home', 'uses' => 'HomeController@postContactus'
    ]);


    Route::get('/api/ad/{slug}',function($slug){
        return  \Ad::show($slug);
    });
    Route::get('/api/b/{slug}',function($slug){
        return  \Ad::show($slug);
    });
    Route::get('/api/category/{slug}', ['as'=>'categoryapi',function($slug){
       return \App\Category::whereSlug($slug)->first()->stores()->limit(5)->get();
    }]);
    Route::get('/api/stores', [
        'as' => 'home', function(){
            $keyword = request()->get('keyword');
            if ($keyword)
            {
                $stores = App\Store::where('name','like','%'.$keyword.'%')->orderBy('name')->get(['name','cashback']);
            }
            else {
                $stores = App\Store::orderBy('name')->get(['name','cashback']);

            }
            return $stores->toJson();
        }
    ]);


    Route::get('/home2', [
        'as' => 'home2', 'uses' => 'HomeController@extrabux'
    ]);


    Route::get('/home', [
        'as' => 'home', 'uses' => 'HomeController@extrabux'
    ]);

    Route::get('/stores', [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);

    Route::get('/pages/{slug}', [
        'as' => 'home', 'uses' => 'HomeController@displayPageBySlug'
    ]);

    Route::get('/plain/{slug}', [
        'as' => 'home', function($slug){
            $page = App\Page::whereSlug( trim($slug) )->first();

            return $page->content;
        }
    ]);

    Route::get('/promo/boxun-right' ,function() {
        return '
        <!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<body>
<a href=http://www.kqzyfj.com/click-7940418-12226380-1432227120000 target=_blank>VPN翻墙服务</a>-<a href=http://www.dpbolvw.net/click-7940418-12183666-1429021479000 target=_blank>MAC好帮手</a>
<BR>
<a href="http://www.dpbolvw.net/click-7940418-11173999-1440086582000" target=_blank>机票</a><img src="http://www.ftjcfx.com/image-7940418-11173999-1440086582000" width="1" height="1" border="0"/>-<a href=http://www.jdoqocy.com/click-7940418-12394396-1446739210000 target=_blank>希尔顿</a>-<a href=http://www.tkqlhce.com/click-7940418-10607057-1419355758000 target=_blank>酒店特价</a>-<a href=http://www.anrdoezrs.net/click-7940418-11348741-1365723425000 target=_blank>民宿</a>
<BR>
<a href= http://www.jdoqocy.com/click-7940418-12152605-1430344845000 target=_blank>精品鞋折扣</a>-<a href=http://www.tkqlhce.com/click-7940418-10833203-1288384463000 target=_blank>品牌珠宝</a>
<BR>
<a href=http://www.anrdoezrs.net/click-7940418-12142593-1430330079000 target=_blank>多语言进修</a>-<a href=http://www.anrdoezrs.net/click-7940418-11588835-1425315629000 target=_blank>旧书网</a>
<BR>
<a href=http://www.tkqlhce.com/click-7940418-11135370-1346945113000 target=_blank>Longly Planet</a>-<a href=http://www.jdoqocy.com/click-7940418-5656118-1441316733000 target=_blank>节日鲜花</a>-<a href=http://www.jdoqocy.com/click-7940418-10543206-1399309862000 target=_blank>送好礼</a>
<BR>
<a href="http://click.linksynergy.com/fs-bin/click?id=XRP5K7ZpX*A&offerid=289612&type=3&subid=0" target=_blank>惠普</a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=XRP5K7ZpX*A&bids=289612&type=3&subid=0">-<a href="http://click.linksynergy.com/fs-bin/click?id=XRP5K7ZpX*A&offerid=407990&type=3&subid=0" target=_blank>BestBuy</a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=XRP5K7ZpX*A&bids=407990&type=3&subid=0">
<BR>
<a href="http://www.jdoqocy.com/click-7940418-10816634-1430843914000?cm_mmc=CJ-_-4647058-_-7940418-_-Save%20BIG%20on%20Walt%20Disney%20World%20Tickets!" target=_blank>迪斯尼优惠</a>-<a href="http://www.jdoqocy.com/click-7940418-10802866-1430843951000?cm_mmc=CJ-_-4647058-_-7940418-_-Carrot%20Top%20Special%20Offer!%20Seat%20Upgrade%20Package!" target=_blank>拉斯维加斯特价秀</a>
<BR>
<a href="http://www.tkqlhce.com/click-7940418-10816254-1434580419000" target=_blank>纽约游門票</a>-<BR><a href=http://www.aboutairportparking.com/?affiliate_id=2034&bf=6b1f target=_blank>机场停车</a>-<a href="http://www.dpbolvw.net/click-7940418-12384462-1446675470000"  target=_blank>租车</a><img src="http://www.ftjcfx.com/image-7940418-12384462-1446675470000" width="1" height="1" border="0"/>
<BR><a target="_blank" rel="nofollow" href="http://www.amazon.com/b?_encoding=UTF8&camp=1789&creative=9325&linkCode=ur2&node=172282&site-redirect=&tag=toshopnet-20&linkId=DIHIJN4MVA3LIUXW" target=_blank><Amazon節日優惠</a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=toshopnet-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
</body>
</html>';

    });
});
