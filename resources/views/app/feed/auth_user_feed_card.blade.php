<div class="media">
<img class="wh-40 border resac-border-light-2 rounded-circle" src="{{ photos_cdn_asset(UserAuth()) }}" alt="Photo {{  UserAuth()->fullname }}">
<div class="media-body ml-2 small">
    <div>
    {{ UserAuth()->fullname }}
    </div>
    <div class="">
    {{  UserAuth()->emploi }} &middot {{  UserAuth()->universite }}
    </div>
</div>
</div>

<hr>