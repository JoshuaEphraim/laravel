<!doctype html>
@extends('layouts.main')
@section('header')
@parent
@stop
@section('content')
<div id="first"><div class="inner"><div class="padder">
            <p class="caption"> Read a reviews <span><span id="rate_1"></span>/10</span></p>
            <p>Our Short Review for : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.liqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.  </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aDuis aute</p>

            <div class="clear"><!--//--></div>
        </div></div></div>
<div id="second"><div class="inner">
        <div class="column">

        </div>
        <div class="column positive">
            <span id="rate_2"></span>
            Positive reviews
        </div>
        <div class="column negative">
            <span id="rate_3"></span>
            Negative reviews
        </div>
        <div class="column" id="menu">
            <ul class="menu">
                <li><span><a href="#review">Reviews</a></span></li>
                <li><span><a href="#discussion">Discussion</a></span></li>
                <li><span><a href="#information">More information</a></span></li>
            </ul>
        </div>
        <div class="clear"><!--//--></div>
    </div></div>
<div id="third"><div class="inner"><div class="padder">
            <div class="lSide">
                <p class="caption">Statistics</p>
                <div id="chart" class="chart"></div>
                <ul class="total">
                    <li><span style="font-size: 40px;"></span>Alexa Rank</li>
                    <li><span style="font-size: 40px;"></span><?php /* echo $alexaRank['dinamik']; */?></li>
                    <li><span style="font-size: 40px;"></span>Regional US</li>
                </ul>
            </div>
            <div class="rSide">
                <div class="map">
                    <div class="visitsMap" style="width:100%; height:275px;" id="visitsMap" ></div>			</span>
                </div>
                <p class="caption">Most Visitors From</p>
                <ul class="locations">
                    <li><a href="#">United States</a></li>
                    <li><a href="#">India</a></li>
                    <li><a href="#">United Kingdom</a></li>
                    <li><a href="#">Canada</a></li>
                    <li><a href="#">Australia</a></li>
                </ul>
            </div>
            <div class="clear"><!--//--></div>
        </div></div></div>
<div class="comments"><div class="inner">
        <p class="caption">Latest Comments</p>



    </div></div>
<div class="information" id="information"><div class="inner">

        <p class="caption">Text</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Volutpat lacus laoreet non curabitur gravida. Vitae suscipit tellus mauris a diam maecenas sed. Gravida cum sociis natoque
            penatibus et magnis dis. Adipiscing bibendum est ultricies integer quis auctor elit. Amet consectetur adipiscing elit duis
            tristique. Ultrices gravida dictum fusce ut placerat orci nulla pellentesque. Sit amet purus gravida quis blandit turpis cursus.
            Amet luctus venenatis lectus magna. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Porttitor leo a diam
            sollicitudin. Egestas diam in arcu cursus. Sagittis id consectetur purus ut faucibus pulvinar. Scelerisque felis imperdiet proin
            fermentum leo vel orci porta.</p>
        <div class="clear"><!--//--></div>
    </div></div>
<div class="white" id="review"><div class="inner"><div class="padder">
            <p class="caption">Reviews</p>
            <div class="clear"><!--//--></div>
            <div class="lSide reviewL">


            </div>
            <div class="rSide reviewR">

            </div>
            <div class="clear"><!--//--></div>



            <div class="clear"><!--//--></div>
        </div></div></div>
<div class="pink"><div class="inner"><div class="padder">
            <p class="caption"> Scam or Legit?</p>
            <p>Our Short Review for </p>
            <p></p>
        </div></div></div>
<div class="white" id="discussion"><div class="inner"><div id="content" class="padder">
            <p class="caption">Discussion</p>
        </div></div></div>
@endsection
@section('footer')
    @parent
    @stop

