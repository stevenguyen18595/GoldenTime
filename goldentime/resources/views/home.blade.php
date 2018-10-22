@extends('layouts.app')

@section('content')
<div class="container">
  <!-- this contain the infor of the slider -->
  <div class="range-slider">
    <div class="range">
    <input id="slider" type="range" min="1" max="7" steps="1" value="1">
    </div>
    <ul class="range-labels ">
      <li class="active selected label">1915</li>
      <li class="label">1916</li>
      <li class="label">1922</li>
      <li class="label">1924</li>
      <li class="label">1925</li>
      <li class="label">1926</li>
      <li class="label">1929</li>
    </ul>
  </div>
  <div class="section">

  </div>


  <div class="columns">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <div class="txt-box">
        Queensland's History from 1915
      </div>
    </div>
    <div class="column">
    </div>
    <div class="column">
    </div>
  </div>
  <!-- here is where we show photos-->
  <div id="list">
  </div>
  <!--here is the scroll to top button -->
  <button id="myBtn" class="button is-large scroll-btn" type="button" name="button" onclick="topFunction()" title="Go To Top">
      <span>
        <i class="fas fa-chevron-up"></i>
      </span>
  </button>
  <!-- the game button -->
  <div class="columns">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <a href="{{url('/game')}}" class="button is-large is-rounded is-light">Try pictionary game</a>
    </div>
    <div class="column">
    </div>
    <div class="column">
    </div>
  </div>
  <!-- here is where we put the audio player-->
  <div class="columns">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <audio controls autoplay tabindex="0">
          <source src="sounds/the_strongest.mp3" type="audio/mpeg">
      </audio>
      <ul id="playlist">
        <li class="active"><a href="sounds/the_strongest.mp3">The strongest one</a></li>
        <li><a href="sounds/prepare_for_battle.mp3">Prepare for battle</a></li>
        <li><a href="sounds/Grant_Line.mp3">Grant_Line</a></li>
      </ul>
    </div>
    <div class="column">
    </div>
    <div class="column">
    </div>
  </div>
</div>
@endsection
