<div class="example-wrap">
                <h2 class="example-title"><i class="icon wb-video"></i> VIDEO TERBARU</h2>
                <p></p>

              
                  <div class="col-lg-12" style="padding: 0; margin-left: -15px;">
                  <?php foreach ($videos as $v): ?>
                  <div class="vcnt" style="background-image: url('<?php echo $v->thumb ?>');">
                  <figure class="overlay">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="/>
                    <figcaption class="overlay-panel overlay-background">
                      <h3 class="tt"><a class="nu" href="<?=$v->link?>"><?php echo $v->judul ?></a></h3>
                      <p><?=substr($v->keterangan,0,80)?></p>
                      <a class="btn btn-outline btn-inverse pb" href="<?=$v->link?>">
                        <i class="fa fa-play"></i>
                      </a>
                    </figcaption>
                    
                  </figure>  
                  </div>  
               
                 <?php endforeach ?>

                </div>
              </div>

<style type="text/css">
  a.nu{text-decoration: none;color: #fff;font-size: 14px; text-transform: uppercase;}
  h3.tt{line-height: 0.5em;}
  .vcnt{
    margin-top: 0px;
    /*height: 200px;*/
    background-position: center center;
    background-size: 170%;
  }
  a.pb{
     bottom: 12px;
    position: absolute;
    right: 8px;
  }
</style>