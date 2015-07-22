<?php $this->assign('title','Raiber  Top Page'); ?>
    <!-- カルーセル -->
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
            <img src="/Raiber_Project/img/item_img/cebu.jpg" alt="picture1" style="width:100%;">  <!-- memo 絶対パス、相対パス -->
            <div class="carousel-caption">
              <h1>Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/img/item_img/cebu2.jpg" alt="picture2" style="width:100%;">
            <div class="carousel-caption">
              <h1>Let's Bertar</h1>
            </div>
          </div>
          <div class="item">
            <img src="/Raiber_Project/img/item_img/cebu3.jpg" alt="picture3" style="width:100%;">
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


<div class="one">
  <div class="ja">
    <p>私たちにはお金だけではなく</p>
    <p>もっと素晴らしいものが</p>
    <p>相手がどうしても欲しいと思うものがたくさんある</p>
  </div>
  <div class="en">
    <p>We have many wonderful things</p>
    <p>other than money</p>
  </div>
</div>



<div class="two">
  <div class="container-fluid">
    <div class="row">
      <div class="two-top">
        <h2>Raiberとは？</h2>
        <p>What's Raiber?</p>
      </div>

      <div class="two-content">
        <div class="step-one col-md-4 col-sm-4 col-sm-12">
          <h3>STEP1</h3>
            <div class="content-ja">
              <p>掲示板に交換に出す物を投稿</p>
              <p>または欲しい物を探します</p>
            </div>
            <div class="content-en">
              <p>Posting or Searching</p>
            </div>
        </div>
        <div class="step-two col-md-4 col-sm-4 col-sm-12">
          <h3>STEP2</h3>
            <div class="content-ja">
              <p>商品ページで交換条件を</p>
              <p>交渉します</p>
            </div>
            <div class="content-en">
              <p>Negotiating</p>
            </div>
        </div>
        <div class="step-three col-md-4 col-sm-4 col-sm-12">
          <h3>STEP3</h3>
            <div class="content-ja">
              <p>交渉で決めた場所で</p>
              <p>交換成立</p>
            </div>
            <div class="content-en">
              <p>Bartering</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<form action="/Raiber_Project/items/index/">
  <button class="button">ENTER</button>
</form>