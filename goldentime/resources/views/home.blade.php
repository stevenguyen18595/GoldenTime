@extends('layouts.app')

@section('content')
<div class="container">

  <div id="timeline" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
    <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min">
    </div>
    <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
    <label class="aus-timeline" style="left:0%"></label>
    <label style="left:0%">1915</label>
    <label class="aus-timeline" style="left:13%"></label>
    <label style="left:13%">1916</label>
    <label class="aus-timeline" style="left:26%"></label>
    <label style="left:26%">1917</label>
    <label class="aus-timeline" style="left:39%"></label>
    <label style="left:39%">1918</label>
    <label class="aus-timeline" style="left:52%"></label>
    <label style="left:52%">1919</label>
    <label class="aus-timeline" style="left:64%"></label>
    <label style="left:64%">1920</label>
    <label class="aus-timeline" style="left:76%"></label>
    <label style="left:76%">1921</label>
    <label class="aus-timeline" style="left:95%"></label>
    <label style="left:95%">1922</label>
  </div>

  <div class="columns">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <div class="txt-box">
        Australia ship 1916
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
  <button class="button is-large scroll-btn" type="button" name="button" onclick="topFunction()" title="Go To Top">
      <span>
        <i class="fas fa-chevron-up"></i>
      </span>
  </button>
</div>
@endsection
