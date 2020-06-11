<style media="screen">

#resume .user-cover-pic{
  height: 80px;
}
#resume .user-photo{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  position: relative;
  top: 30px;
}
#resume .resume-content{
  position: relative;
}
</style>

<div id="resume">
  <div class="border bg-primary user-cover-pic">
    <div class="text-center">
      <img class="user-photo" src="{{ $user->photo }}" alt="">
    </div>
  </div>
  <div class="bg-white pt-5 pb-3 border-bottom border-left border-right">
    <div class="text-center resume-content">
      <div class="h6 text-dark">{{ $user->fullname }}</div>
      <div class="small">
        {{ $user->emploi }} &middot {{ $user->universite }}
      </div>
    </div>
  </div>
</div>
