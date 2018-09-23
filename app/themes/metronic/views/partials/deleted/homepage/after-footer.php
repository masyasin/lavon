<!-- <script src="https://cdn.bkpp.tangerangselatankota.go.id/tirto-front-end-desktop/v1/js/vendor/jquery-1.11.2.min.js" type="text/javascript"></script> -->
<!-- <script src="https://cdn.bkpp.tangerangselatankota.go.id/tirto-front-end-desktop/v1/js/vendor/bootstrap.min.js" type="text/javascript"></script> -->
<!-- <script src="https://cdn.bkpp.tangerangselatankota.go.id/tirto-front-end-desktop/v1/js/plugins.js?v=2" type="text/javascript"></script> -->
<!-- <script src="https://cdn.bkpp.tangerangselatankota.go.id/tirto-front-end-desktop/v1/js/carts.js" type="text/javascript"></script> -->
<script type="text/javascript">
// (function() {
//     $('.popular-artikel-pie-cart').highcharts({
//         colors: ['#33cc66', '#ff0000', '#e0e0e0', '#00ccff'],
//         plotOptions: {
//             series: {
//                 dataLabels: {
//                     enabled: false
//                 }
//             }
//         },
//         series: [{
//             name: 'Sentiment <br />',
//             colorByPoint: true,
//             data: jsonSentiment
//         }]
//     });
//     // TOP NEWSMAKER
//     $('.top-newsmaker-pie-cart').highcharts({
//         colors: ['#ff0000', '#33cc66', '#e0e0e0', '#007eb4', '#0098da'],
//         chart: {
//             backgroundColor: '#999999'
//         },
//         tooltip: {
//             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//         },
//         plotOptions: {
//             series: {
//                 dataLabels: {
//                     enabled: true,
//                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
//                     distance: 20
//                 }
//             }
//         },
//         series: [{
//             name: 'Top Newsmaker <br />',
//             colorByPoint: true,
//             states: {
//                 hover: {
//                     enabled: false
//                 }
//             },
//             data: jsonNewsmaker
//         }]
//     });
// })
</script>
<script src="{{ base_url }}app/themes/tirto/js/main.js" type="text/javascript"></script>
<script src="{{ base_url }}app/themes/tirto/js/share.js" type="text/javascript"></script>
<script src="{{ base_url }}app/themes/tirto/js/jquery.autocomplete.js" type="text/javascript"></script>
<script type="text/javascript">
// $('input[name="q"]').autocomplete({
//     serviceUrl: '//suggestqueries.google.com/complete/search?client=chrome&hl=id&callback=?',
//     dataType: 'jsonp',
//     paramName: 'q',
//     lookupLimit: 5,
//     onSelect: function(event, ui) {
//         if (typeof event.value !== 'undefined') {
//             found = event.value.split(" ").length;
//             if (found > 1) {
//                 $(this).closest('input[type="submit"]').attr('disabled', 'true');
//                 $(this).closest("form").submit();
//             }
//         }
//     },
//     transformResult: function(response) {
//         return {
//             suggestions: $.map(response[1], function(dataItem) {
//                 return {
//                     value: dataItem,
//                     data: dataItem
//                 };
//             })
//         };
//     }
// });
</script> 

<script type="text/javascript">
(function($){
    $(window).load(function() {
    //     $(".tokoh").mCustomScrollbar({
    //         theme: "rounded-dark"
    //     });
    //     $('.latest-persepsi .media-online, .latest-persepsi .publik').each(function() {
    //         $(this).qtip({
    //             content: {
    //                 text: $(this).find('.stats-hover')
    //             },
    //             style: {
    //                 classes: 'qtip-stats-hover'
    //             },
    //             position: {
    //                 target: 'mouse', // Track the mouse as the positioning target
    //                 my: 'left top',
    //                 at: 'right top',
    //                 adjust: {
    //                     x: 5,
    //                     y: 5
    //                 } // Offset it slightly from under the mouse
    //             }
    //         });
    //     });
    //     $('.sidetabs #newsmaker figure').each(function() {
    //         $(this).qtip({
    //             content: {
    //                 text: $(this).find('.stats-hover')
    //             },
    //             style: {
    //                 classes: 'qtip-stats-hover',
    //                 tip: {
    //                     corner: false
    //                 }
    //             },
    //             position: {
    //                 target: 'mouse', // Track the mouse as the positioning target
    //                 my: 'top right',
    //                 at: 'bottom right',
    //                 resize: true,
    //                 adjust: {
    //                     x: 5,
    //                     y: 5
    //                 } // Offset it slightly from under the mouse
    //             }
    //         });
    //     });
    });
    $(".lipre").click(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url'),
            detail = $(this).attr('data-detail'),
            title = $(this).html(),
            x = 'https://bkpp.tangerangselatankota.go.id/x/',
            d = '/desktop/index.html',
            h = $('#ifrpre').attr('height'),
            /*document.getElementById("ifrpre").height,*/
            app = '{{ base_url }}';
        $("#ttlpre").html(title);
        $("#ifrpre").attr('src', x + url + d);
        $("#ifrpre").attr('height', h);
        $("#dtlpre").attr('href', app + detail);
    });
})(jQuery);
window.onload = function() {
    // scrollProgress.set({
    //     styles: false,
    //     events: false,
    //     bottom: false
    // });
    // window.onresize = scrollProgress.update;
    // window.onscroll = scrollProgress.trigger;
     
    $('div.container.animsition').on('animsition.inEnd', function(){
        $('.lazy').Lazy({
            // your configuration goes here
            // scrollDirection: 'vertical',
            effect: 'show',
            // visibleOnly: true,
            onError: function(element) {
                console.log('error loading ' + element.data('src'));
            }
        });
    })
};
</script>
<style type="text/css">
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{
        font-family: "proxima_novabold";
    }
    .list-icons>li i {
    float: left;
    width: 1em;
    margin: 4px 6px 0 0;
}
</style>