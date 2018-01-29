<?php echo $header; ?>
<?php echo $column_left; ?>
<?php echo $column_right; ?>
  <div id="content">
<?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <a <?php echo(($breadcrumb == end($breadcrumbs)) ? 'class="last"' : ''); ?> href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <div style="background: white;border: 1px solid #eaeaea;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;padding: 10px;">
  <h1><?php echo $heading_title; ?></h1>
  <div class="success"><?php echo $description; ?></div>
  <hr />
	<style>
/* Portfolio

----------------------------------------------------------------------------------------------------*/
.mygallery a img:hover {
	opacity: .85;
}

.mygallery .portfolio-filter,.mygallery  article{
	background: #fff; /* Old browsers */
	background: -moz-linear-gradient(left, #f7f7f7 0%, #ffffff 4%, #ffffff 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,#f7f7f7), color-stop(4%,#ffffff), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left, #f7f7f7 0%,#ffffff 4%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left, #f7f7f7 0%,#ffffff 4%,#ffffff 100%); /* Opera11.10+ */
	background: -ms-linear-gradient(left, #f7f7f7 0%,#ffffff 4%,#ffffff 100%); /* IE10+ */
	background: linear-gradient(left, #f7f7f7 0%,#ffffff 4%,#ffffff 100%); /* W3C */
	
	position: relative;	
	-webkit-box-shadow: 0px 0px 1px 0px #ccc;
	-moz-box-shadow: 0px 0px 1px 0px #ccc;
	box-shadow: 0px 0px 3px 0px #ccc;	
	padding: 30px 30px 10px 30px; /* default, may be overriden down the file*/
	margin: 0 0 10px 0; /* default, may be overriden down the file*/
	}
.mygallery .featured-image img,.mygallery .entry-content img,.mygallery .comment-content img,.mygallery .portfolio-item img,.mygallery .widget img {
	max-width:100%;
	height:auto;
	max-height:140px;
	}
.mygallery .portfolio-item-wrap {
	-webkit-column-count: 3;
	-webkit-column-gap: 0px;
	-webkit-column-fill: auto;
	-moz-column-count: 3;
	-moz-column-gap: 0px;
	-moz-column-fill: auto;
	column-count: 3;
	column-gap: 0px;
	column-fill: auto;
}
.mygallery .portfolio-item {
	-webkit-column-break-inside: avoid;
	-moz-column-break-inside: avoid;
	column-break-inside: avoid;
	padding: 0;
}
.mygallery .portfolio-item img {
	display: block;
}
.mygallery .portfolio-item-meta a {
	font-size: 12px;
	font-weight:bold;
	color: #000;
}
.mygallery .portfolio-item-meta a:hover {
	text-decoration: none;
}
.mygallery .portfolio-item-meta {
	width:80%;
	height:18px;
	overflow:hidden;
	margin: 0;
	padding: 15px;
	text-align: center;
	font-size: 13px;
}

.mygallery .portfolio-item {
	width:98%;
	}
.mygallery ul.sub {
	list-style:none;
	-webkit-column-count: 1;
	-webkit-column-gap: 0px;
	-webkit-column-fill: auto;
	-moz-column-count: 1;
	-moz-column-gap: 0px;
	-moz-column-fill: auto;
	column-count: 1;
	column-gap: 0px;
	column-fill: auto;
	padding-bottom:15px;
	}
.mygallery ul.sub li {
	-webkit-column-break-inside: avoid;
	-moz-column-break-inside: avoid;
	column-break-inside: avoid;
	}
.mygallery ul.sub li img{
	display:inline;
	height:18px;
	max-width:30px;
	}
.mygallery ul.sub li span{
	display:inline;
	margin-left:25px;
	}
.mygallery {
	width:100%;
	padding-top:15px;
	}
</style>
 <div class="mygallery">
 	<div class="portfolio-item-wrap">
          <?php foreach($cats as $cat){  ?>
          	<?php if($cat['image']) { ?>
				<article class="portfolio-item">
                	<center>
					<a rel="gallery" href="<?php echo $cat['url'] ?>" title="Portfolio Item Title">
						<img src="<?php echo $cat['image'] ?>" alt="Portfolio Item">
					</a>
					<p class="portfolio-item-meta">
						<a class="link" href="<?php echo $cat['url'] ?>"><?php echo $cat['name'] ?></a>
					</p>
                    </center>
                    <ul class="sub">
                    <?php foreach($cat['subcats'] as $subcat){  ?>
                         <li><a href="<?php echo $subcat['url'] ?>" title="<?php echo $subcat['name'] ?>">
                         <?php if($subcat['image']){ ?><img src="<?php echo $subcat['image'] ?>" /><?php } ?>
                         <span><?php echo $subcat['name'] ?></span></a></li>
                    <?php } ?>
                    </ul>
				</article>
          	<?php } ?>
          <?php } ?>
    </div>
 </div>
 </div>
  <?php echo $content_bottom; ?>
  </div>
<?php echo $footer; ?>