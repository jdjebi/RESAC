<style media="screen">
.last-feature .content{
  font-size: 13px
}
</style>
<div class="last-feature">
  <div class="border bg-white pb-2">
    <div class="font-weight-bold border-bottom pt-2 pl-3 pb-2"> Dernières nouveautés</div>
    <div class="pl-3 pt-2">
      <a href="{{ route("dev_news") }}">{{ $last_feature->title }}</a>
    </div>
    <p class="pl-3 pr-3 content">
      {!! substr($last_feature->content, 0, 245) !!}... <a href="{{ route("dev_news") }}">voir plus</a>.
    </p>
    <div class="">
    </div>
  </div>

</div>
