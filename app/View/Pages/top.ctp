<?php $this->assign('title','Raiber  Top Page'); ?>

<div class="main">
  <div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:100%; margin-bottom:400px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/Raiber_Project/item_img/cebu.jpg" alt="picture1">  <!-- memo 絶対パス、相対パス -->
            <div class="carousel-caption">
              <h1>Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/item_img/cebu2.jpg" alt="picture2">
            <div class="carousel-caption">
              <h1>Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/item_img/cebu3.jpg" alt="picture3">
            <div class="carousel-caption">
              <h1>Let's Bertar</h1>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="words">
      <p class="words">私たちにはお金だけではなく</p>
      <p class="words">もっと素晴らしいものが</p>
      <p class="words_border">相手がどうしても欲しいと思うものがたくさんある</p>
      <p class="words_english">we have also other wonderful things</p>
      <p class="words_english">other than money</p>
    </div>

    <div class="row" style="margin-top:90px; background-color:#00a1e9; margin-top:370px">

      <div class="howto">
        <p class="what">Raiberとは</p>
        <p style="color:#ffffff;">What’s Raiber?</p>

      
        <div class="col-sm-4" style="background-color: blue; height: 400px;">青</div>
        <div class="col-sm-4" style="background-color: red; height: 400px;">赤</div>
        <div class="col-sm-4" style="background-color: yellow; height: 400px;">黄色</div>
      </div>
    </div>
  </div>
</div>

<div class="footer">