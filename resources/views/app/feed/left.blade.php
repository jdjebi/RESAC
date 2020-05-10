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
      <img class="user-photo" src="{{ $user->get_photo() }}" alt="">
    </div>
  </div>
  <div class="bg-white pt-5 pb-3 border-bottom border-left border-right">
    <div class="text-center resume-content">
      <div class="h6 text-dark">{{ $user->get_complete_name() }}</div>
      <div class="small">
        {{ $user->get_emploi() }} &middot {{ $user->get_universite() }}
      </div>
    </div>
  </div>
</div>
