<div class="sidetabs">
        <ul class="nav nav-tabs">
          <li class="popular active"><a href="#popular" data-toggle="tab">Pupuler</a></li>
          <li class="newsmaker"><a href="#newsmaker" data-toggle="tab">Interaksi</a></li>
        </ul>
        <div class="tab-content">
         
          <div class="tab-pane" id="newsmaker">
            <div class="cart">
              <h4 class="title" style="font-size: 16px">Grafik Interaksi Pengguna</h4>
              <div class="popular-artikel-pie-cart col-md-6 col-no-gutter"></div>
              <div class="legend col-md-6 col-no-gutter">
                <ul>
                  <li class="total-artikel">
                    <span class="count">{{interaksi.buku_tamu}}</span>&nbsp;<span class="text">Buku Tamu</span>
                  </li>
                  <li class="positif">
                    <span class="count">{{interaksi.konsultasi}}</span>&nbsp;<span class="text">Konsultasi</span>
                  </li>
                  <li class="negatif">
                    <span class="count">{{interaksi.terjawab}}</span>&nbsp;<span class="text">Terjawab</span>
                  </li>
                  <li class="netral">
                    <span class="count">{{interaksi.belum_terjawab}}</span>&nbsp;<span class="text">Belum Terjawab</span>
                  </li>
                </ul>
                
              </div>
              <div class="note">
               
              </div>
            </div>
            
          </div>
          <div class="tab-pane active" id="popular">
            <figure>
              <a style='text-decoration:none' v-bind:href="posts[0].link">
                <img v-bind:alt="posts[0].title" v-bind:data-src="posts[0].imagurl" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="178" height="105" class="lazy">
                <figcaption>
                {{ posts[0].title }} </figcaption>
              </a>
            </figure>
            <ol class="other-cart">
              <li v-for="p in posts" v-if="$index > 0">
                <a v-bind:href="p.link">
                {{{ p.title }}} </a>
              </li>
             
            </ol>
          </div>
        </div>
      </div>


<script type="text/javascript">
<? $interaksi = bkpp_m('get_data_interaksi'); ?> 
var interaksi = <?=json_encode($interaksi)?>;
  $(document).ready(function(){
    var posts = <?= json_encode(bkpp_m('get_popular_posts',6)) ?>

    new Vue({
      el:'#popular',
      data: {
        posts : posts
      }
    });

    new Vue({
      el:'#newsmaker',
      data: {
        interaksi : interaksi
      }
    });
    $('div.container.animsition').on('animsition.inEnd', function(){
        console.log('loadCart')
        loadCart();
    })
    
  });


function loadCart()  {
    var plugin_url = '{{ base_url }}app/themes/tirto/js/plugin.js';
    
    $.getScript(plugin_url,function(){
        try{
        Highcharts.theme = {
            colors: [ '#00ccff','#33cc66','#ff0000',  '#e0e0e0'],
            chart: {
                backgroundColor: 'rgba(255, 255, 255, 0)',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '',
                style: {
                    color: '#4e5a62',
                    font: '16px "gotham_bookregular", Verdana, sans-serif'
                }
            },
            subtitle: {
                style: {
                    color: '#4e5a62',
                    font: '10px "gotham_bookregular", Verdana, sans-serif'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.percentage:.1f}%'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    slicedOffset: 3,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        useHTML: true,
                        distance: -35,
                        style: {
                            TextAlign: 'center',
                            fontWeight: 'normal',
                            fontSize: '9px',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        },
                        format: '{point.name}<br><strong>{point.percentage} %</strong>',
                    },
                    showInLegend: false
                }
            },
            legend: {
                itemStyle: {
                    font: '9px "gotham_bookregular", Verdana, sans-serif',
                    color: '#4e5a62'
                },
                itemHoverStyle: {
                    color: '#0098da'
                }
            },
            credits: {
                enabled: false
            },
        };
        Highcharts.setOptions(Highcharts.theme);

        
        $('.popular-artikel-pie-cart').highcharts({
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: false
                    }
                }
            },
            series: [{
                name: 'Grafik Interaksi Pengguna',
                colorByPoint: true,
                data: [{
                    name: 'Buku Tamu',
                    y: <?=$interaksi['buku_tamu']?>,
                    sliced: true
                }, {
                    name: 'Konsultasi',
                    y: <?= $interaksi['konsultasi']?>,
                    sliced: true
                }, {
                    name: 'Terjawab',
                    y: <?=$interaksi['terjawab']?>,
                    sliced: true
                }, {
                    name: 'Belum Terjawab',
                    y: <?=$interaksi['belum_terjawab']?>,
                    sliced: true
                }]
            }]
        });
    }catch(e){
        console.log(e);
    }
    });
    
}
</script>