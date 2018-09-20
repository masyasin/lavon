<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
  <script src="{{ base_url }}public/assets/themes/global/vendor/masonry/masonry.pkgd.min.js"></script>
  <script src="{{ base_url }}public/assets/themes/global/js/components/masonry.min.js"></script>
<div class="page animsition">
	<div class="page-content container-fluid">
		<h3>Dashboard</h3>
	</div>
	<div class="page-content container-fluid" style="padding-top: 0;padding-bottom: 0">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="widget">
							<a href="{{ site_url }}admin/bkpp/profile">
							<div class="widget-content padding-25 bg-white">
								<div class="counter counter-lg">
									<span class="counter-number"><?=$statistics->profile?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-user" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Profile</div>
								</div>
							</div>
							</a> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget">
							<a href="{{ site_url }}admin/bkpp/layanan">

							<div class="widget-content padding-25 bg-white">
								<div class="counter counter-lg">
									<span class="counter-number"><?=$statistics->layanan?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-users" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Layanan</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget">
							<a href="{{ site_url }}admin/galeri">

							<div class="widget-content padding-25 bg-blue-600">
								<div class="counter counter-lg counter-inverse">
									<span class="counter-number"><?=$statistics->galeri?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-image" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Galeri</div>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget">
							<a href="{{ site_url }}admin/video">

							<div class="widget-content padding-25 bg-purple-600">
								<div class="counter counter-lg counter-inverse">
									<span class="counter-number"><?=$statistics->video?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-video" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Video</div>
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="widget" style="overflow: hidden;">
							<a href="{{ site_url }}admin/artikel">

					<div class="widget-content">
						<div class="row no-space">
							<div class="col-sm-6">
								<div class="counter counter-md vertical-align bg-white height-300">
									<div class="counter-icon padding-30 green-600" style="position:absolute;top:0;left:0;">
										<i class="icon wb-pencil" aria-hidden="true"></i>
									</div>
									<div class="counter-number-group font-size-30 vertical-align-middle">
										<span class="counter-icon green-600 margin-right-10"><i class="wb-graph-up"></i></span>
										<span class="counter-number"><?=$statistics->article->all?></span>
										<div class="margin-top-3">Artikel</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="vertical-align text-center  padding-30">
									<div class="counter-number-group font-size-30 padding-10 vertical-align-middle">
										<span class="counter-number"><?=$statistics->article->publish?></span>
										<div class="margin-top-2 font-size-20">Publish</div>
									</div>
									<div class="counter-number-group font-size-30 padding-10 vertical-align-middle">
										<span class="counter-number"><?=$statistics->article->draft?></span>
										<div class="margin-top-2 font-size-20">Draft</div>
									</div>
								</div>
								<div class="vertical-align text-center  padding-30">
									<div class="counter-number-group font-size-30 vertical-align-middle">
										<span class="counter-icon green-600 margin-right-10"><i class="wb-chat"></i></span>
										<span class="counter-number"><?=$statistics->article->comments?></span>
										<div class="margin-top-2 font-size-20">Komentar</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				</div>
			</div>
			<div class="clearfix visible-lg-block"></div>
			<div class="col-lg-6 col-md-12">
				<div class="widget">
					<div class="widget-content  bg-white" style="padding: 35px">
						<div class="row">
							
							<div class="col-md-6">
								<a href="{{ site_url }}admin/bkpp/info-dinas" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->info_dinas?></span>
									<span class="counter-icon margin-left-10"><i class="icon fa-bullhorn" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Info Dinas</div>
								</div>
							</a>
							</div>
							<div class="col-md-6">
								<a href="{{ site_url }}admin/bkpp/agenda-kegiatan" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->agenda_kegiatan?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-calendar" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Agenda Kegiatan</div>
								</div>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="widget">
								<a href="{{ site_url }}admin/bkpp/konsultasi" class="widget-link">

							<div class="widget-content padding-25 bg-white">
								<div class="counter counter-lg">
									<div class="counter-label text-uppercase">Konsultasi</div>
									<span class="counter-number"><?=$statistics->konsultasi->all?></span>
									<div class="counter-label">Dijawab <span class="badge badge-success"><?=$statistics->konsultasi->terjawab?></span>&nbsp;Belum <span class="badge badge-danger"><?=$statistics->konsultasi->belum?></span> </div>
								</div>
							</div>
						</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="widget">
								<a href="{{ site_url }}admin/bkpp/buku-tamu" class="widget-link">

							<div class="widget-content padding-25 bg-white">
								<div class="counter counter-lg">
									<div class="counter-label text-uppercase">Buku Tamu</div>
									<span class="counter-number"><?=$statistics->buku_tamu->all?></span>
									<div class="counter-label">Ditanggapi <span class="badge badge-success"><?=$statistics->buku_tamu->terjawab?></span> &nbsp;Belum <span class="badge badge-danger"><?=$statistics->buku_tamu->belum?></span> </div>
								</div>
							</div>
						</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-lg-block"></div>
			<div class="col-lg-6 col-md-12">
				<div class="widget">
					<div class="widget-content  bg-white" style="padding: 35px">
						<div class="row">
							<div class="col-md-6">
								<a href="{{ site_url }}admin/download" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->download?></span>
									<span class="counter-icon margin-left-10"><i class="icon wb-download" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Download</div>
								</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="{{ site_url }}admin/image-slider" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->popup_image?></span>
									<span class="counter-icon margin-left-10"><i class="icon fa-photo" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Popup Image</div>
								</div>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="widget">
					<div class="widget-content  bg-white" style="padding: 35px">
						<div class="row">
							<div class="col-md-6">
								<a href="{{ site_url }}admin/bkpp/pengumuman" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->pengumuman?></span>
									<span class="counter-icon margin-left-10"><i class="icon fa-bell-o" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Pengumuman</div>
								</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="{{ site_url }}admin/polling" class="widget-link">

								<div class="counter counter-lg  padding-left-20">
									<span class="counter-number"><?=$statistics->polling?></span>
									<span class="counter-icon margin-left-10"><i class="icon fa-thumbs-o-up" aria-hidden="true"></i></span>
									<div class="counter-label text-uppercase">Polling</div>
								</div>
							</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="page-content container-fluid" style="padding-top: 0">
		<div class="row" data-plugin="masonry">
		 
		<div class="col-md-6 col-xs-12 masonry-item">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="panel-title-icon icon wb-pencil" aria-hidden="true"></i>Artikel Terbaru</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group list-group-dividered list-group-full">
						<?foreach($recents->articles as $article):?>
						<li class="list-group-item">
							<div class="media">
								<div class="media-left">
									<a class="avatar" href="javascript:void(0)">
										<img src="<?=  'http://www.gravatar.com/avatar/'.md5($article->user_email).'?s=32&r=pg&d=identicon'; ?>" alt="">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<small class="pull-right"><?=$article->t_ago?></small>
									<h4 class="media-heading"><?=$article->judul?></h4>
									<small>oleh <a href="javascript:void(0)" title="<?=$article->penulis?>"><?=$article->penulis?></a> dalam <a class="label label-outline label-default" href="javascript:void(0)" title="<?=$article->kategori?>"><?=$article->kategori?></a></small>
								</div>
							</div>
						</li>
						<?endforeach?>
					</ul>
				</div>
			</div>
			
		</div>
	 	
	 	<div class="col-md-6 col-xs-12 masonry-item">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="panel-title-icon icon wb-chat-group" aria-hidden="true"></i>Komentar Terbaru</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group list-group-dividered list-group-full">
						<?foreach($recents->comments as $comment):?>
						<li class="list-group-item">
							<div class="media">
								<div class="media-left">
									<a class="avatar" href="javascript:void(0)">
										<img src="<?=  'http://www.gravatar.com/avatar/'.md5($comment->email).'?s=32&r=pg&d=identicon'; ?>" alt="">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<strong><?=$comment->name?></strong><small class="pull-right"><?=$comment->date_ta?></small>
									
									menanggapi <small> <a href="javascript:void(0)" title="<?=$comment->article_title?>"><?=$comment->article_title?></a> </small>
									<small><i><?=$comment->content?></i></small>
								</div>
							</div>
						</li>
						<?endforeach?>
					</ul>
				</div>
			</div>
			
		</div>	
		<div class="col-md-6 col-xs-12 masonry-item">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="panel-title-icon icon wb-bookmark" aria-hidden="true"></i>Konsultasi</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group list-group-dividered list-group-full">
						<?foreach($recents->konsultasi as $bt):?>
						<li class="list-group-item">
							<div class="media">
								<div class="media-left">
									<a class="avatar" href="javascript:void(0)">
										<img src="<?=  'http://www.gravatar.com/avatar/'.md5($bt->email).'?s=32&r=pg&d=identicon'; ?>" alt="">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<strong><?=$bt->pengirim?></strong><small class="pull-right"><?=$bt->t_ago?></small>
									
									bertanya pada <small><?=$bt->kepada?></small> : <small><i><?=$bt->pertanyaan?></i></small>
								</div>
							</div>
						</li>
						<?endforeach?>
					</ul>
				</div>
			</div>
			
		</div>
		<div class="col-md-6 col-xs-12 masonry-item">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="panel-title-icon icon wb-bookmark" aria-hidden="true"></i>Buku Tamu</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group list-group-dividered list-group-full">
						<?foreach($recents->buku_tamu as $bt):?>
						<li class="list-group-item">
							<div class="media">
								<div class="media-left">
									<a class="avatar" href="javascript:void(0)">
										<img src="<?=  'http://www.gravatar.com/avatar/'.md5($bt->email).'?s=32&r=pg&d=identicon'; ?>" alt="">
										<i></i>
									</a>
								</div>
								<div class="media-body">
									<strong><?=$bt->nama?></strong><small class="pull-right"><?=$bt->t_ago?></small>
									
									menulis <small><i><?=$bt->isi?></i></small>
								</div>
							</div>
						</li>
						<?endforeach?>
					</ul>
				</div>
			</div>
			
		</div>
		<div class="col-md-6 col-xs-12 masonry-item">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="panel-title-icon icon wb-bookmark" aria-hidden="true"></i>Hasil Polling</h3>
					
				</div>
				<div class="panel-body"><p><?=$poll_results['judul']?></p>
				 <?foreach($poll_results['data'] as $p):?>
      <div class="contextual-progress" >
        <div class="clearfix">
          <div class="progress-title"><?=$p['title']?></div>
          <div class="progress-label"><?=$p['percentage']?> %</div>
        </div>
        <div class="progress" data-goal="<?=$p['total']?>" data-plugin="progress">
          <div class="progress-bar progress-bar-success" aria-valuemin="0" aria-valuemax="<?=$poll_results['total']?>" aria-valuenow="<?=$p['percentage']?>" role="progressbar" style="width:<?=$p['percentage'] .'%'?>">
            <span class="progress-label"><?=$p['percentage']?> %</span>
          </div>
        </div>
      </div>
 <?endforeach?>
				</div>
			</div>
			
		</div>	
		</div>
	</div>
</div>

<style type="text/css">
	.widget >a,
	.widget a.widget-link {
		text-decoration: none;
		color: #333;
	}
</style>