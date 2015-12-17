<?php





Route::group(['domain'=>env('ADMIN_DOMAIN','admin.cp.dev')] , function(){
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group( ['middleware' => 'auth'],function () {

    Route::get('/home', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);
    Route::get('/', [
        'as' => 'home', 'uses' => 'DashboardController@index'
    ]);

    Route::get('/goods', [
        'as' => 'goods', 'uses' => 'GoodsController@index'
    ]);

    Route::resource('categories', 'CategoriesController');
    Route::resource('stories', 'StoriesController');
    Route::resource('goods', 'GoodsController');

});

});

Route::group(['namespace'=>'Frontend'], function() {
    Route::get('/', [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);
    Route::get('/promo/boxun-right' ,function() {
        return '
        <!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<body>
<B><a href="http://www.dpbolvw.net/click-7940418-11173999-1440086582000" target=_blank>最便宜机票，降价了退差价</a><img src="http://www.ftjcfx.com/image-7940418-11173999-1440086582000" width="1" height="1" border="0"/>
<BR>
<a href="http://click.linksynergy.com/fs-bin/click?id=XRP5K7ZpX*A&offerid=289612&type=3&subid=0" target=_blank>惠普电脑甩卖</a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=XRP5K7ZpX*A&bids=289612&type=3&subid=0">
<BR>
<a href="http://click.linksynergy.com/fs-bin/click?id=XRP5K7ZpX*A&offerid=407990&type=3&subid=0" target=_blank>BestBuy大降价 </a><IMG border=0 width=1 height=1 src="http://ad.linksynergy.com/fs-bin/show?id=XRP5K7ZpX*A&bids=407990&type=3&subid=0">
<BR>
<a href="http://www.jdoqocy.com/click-7940418-10816634-1430843914000?cm_mmc=CJ-_-4647058-_-7940418-_-Save%20BIG%20on%20Walt%20Disney%20World%20Tickets!" target=_blank>迪斯尼乐园票价大优惠</a>
<BR>
<a href="http://www.jdoqocy.com/click-7940418-10802866-1430843951000?cm_mmc=CJ-_-4647058-_-7940418-_-Carrot%20Top%20Special%20Offer!%20Seat%20Upgrade%20Package!" target=_blank>拉斯维加斯演出</a>
<BR>
<a href="http://www.dpbolvw.net/click-7940418-12384462-1446675470000"  target=_blank>便宜！美国Fox租车</a><img src="http://www.ftjcfx.com/image-7940418-12384462-1446675470000" width="1" height="1" border="0"/>
<BR><a href="http://www.tkqlhce.com/click-7940418-10816254-1434580419000" target=_blank>游玩纽约便宜票价</a>
<BR><a href=http://www.aboutairportparking.com/?affiliate_id=2034&bf=6b1f target=_blank>机场停车</a>

</b>
</body>
</html>';

    });
});