$(function() {
    var event = $('.js-event-toggle');
    var eventNewsId;

    event.on('click', function() {
        console.log(1);
        var $this = $(this);
        eventNewsId = $this.data('eventid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxevent', //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'news_id': eventNewsId //コントローラーに渡すパラメーター
            },
        })

        // Ajaxリクエストが成功した場合
        .done(function(data) {
                //lovedクラスを追加
                $this.toggleClass('event');
                //.eventsCountの次の要素のhtmlを「data.posteventsCount」の値に書き換える
                $this.next('.eventsCount').html('参加をやめる');
            })
            // Ajaxリクエストが失敗した場合
            .fail(function(data, xhr, err) {
                //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });
});