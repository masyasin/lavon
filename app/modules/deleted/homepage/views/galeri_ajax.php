<?foreach($akg as $i ):?>
  <?

  $imagurl = base_url(). 'files/thumb/'.$i['image'].'/300/225';
  ?>
  <li class="widget">
          <div class="cover overlay overlay-hover">
            <img class="cover-image overlay-scale" src="<?=$imagurl?>" alt="<?=$i['image_alt']?>">
            <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align">
              <div class="vertical-align-middle">
                <div class="widget-time widget-divider">
                  <span><?=$i['date']?></span>
                </div>
                <h3 class="widget-title margin-bottom-20"><?=$i['title']?></h3>
                <a href="<?=site_url().$i['link']?>" class="btn btn-outline btn-inverse"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
        </li>
<?endforeach?>