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
              <h1 style="background-color:rgba(0,0,0,0.65);">Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/item_img/cebu2.jpg" alt="picture2">
            <div class="carousel-caption">
              <h1 style="background-color:rgba(0,0,0,0.65);">Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/item_img/cebu3.jpg" alt="picture3">
            <div class="carousel-caption">
              <h1 style="background-color:rgba(0,0,0,0.65);">Let's Bertar</h1>
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
      <p class="words_english">we have wonderful things</p>
      <p class="words_english">other than money</p>
    </div>

    <div class="row" style="margin-top:90px; background-color:#00a1e9; margin-top:370px">

        <div class="howto">
          <p class="what">Raiberとは</p>
          <p style="color:#ffffff; margin-bottom:120px">What’s Raiber?</p>

        
          <div class="col-sm-4" style="height: 450px;">
            <div class="site-logo">
            　<div class="site-info">
            　　<h1>STEP1</h1>
            　</div>
            </div>
            <div class="text" style="padding-top:30px;">
              <p>掲示板に交換に出す物を投稿</p>
              <p>または欲しい物を探します</p>
            </div>
            <div class="text-mini" style="padding-top:30px;">
              <p>Posting or Searching</p>
            </div>
          </div>

          <div class="col-sm-4" style="height: 450px;">
            <div class="site-logo">
            　<div class="site-info">
            　　<h1>STEP2</h1>
            　</div>
            </div>
            <div class="text" style="padding-top:30px;">
              <p>商品ページで交換条件を</p>
              <p>交渉します</p>
            </div>
            <div class="text-mini" style="padding-top:30px;">
              <p>Negotiating about the terms</p>
              <p>in item page</p>
            </div>
          </div>
          
          <div class="col-sm-4" style="height: 450px;">
            <div class="site-logo">
            　<div class="site-info">
            　　<h1>STEP3</h1>
            　</div>
            </div>
            <div class="text" style="padding-top:30px;">
              <p>交渉で決めた場所で</p>
              <p>交換成立</p>
            </div>
            <div class="text-mini" style="padding-top:30px;">
              <p>Bartering at the place where</p>
              <p>is decided by negotiation</p>
            </div>
          </div>

        </div>
      </div>

        <!-- <p><a  class="btn btn-warning btn-lg" href="http://192.168.33.10/Raiber_Project/items">ENTER</a></p> -->
        <form action="/Raiber_Project/items/index">
          <button class="button" type="submit">ENTER</button>
        </form>

    </div>
  </div>
</div>

<div class="footer">