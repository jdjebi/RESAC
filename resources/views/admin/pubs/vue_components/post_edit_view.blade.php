<div v-if="post">
    <div class="pub-box">
        <div class="box resac-linkedin-shadow bg-white mb-3 resac-clear-rounded-on-sm resac-clear-border-left-on-sm resac-clear-border-right-on-sm">
            <div class="header pl-4 pt-3 pb-3 pr-4">
                <div class="media">
                    <a v-bind:title:="post.user.fullname" v-bind:href="post.user.profil_url">
                    <img class="pub-user-photo" v-bind:src="post.user.photo" v-bind:alt="'Photo' + post.user.fullname">
                    </a>
                    <div class="ml-3 media-body">
                        <div class="mt-0 pub-user-name">
                            <a v-bind:href="post.user.profil_url" v-text="post.user.fullname"></a> &nbsp;
                            <span v-bind:title="post.validate_status_title" v-bind:class="'text-'+post.validate_status_tag">
                                <i class="fa fa-check-circle"></i>
                            </span>   
                        </div>
        
                        <span class="text-muted small">
                            <span class="post-badge post-badge-info mr-1">INFO</span>&nbsp;
                            <time class="timeago"  v-bind:datetime="post.date" v-bind:title="post.date"> <i class="far fa-clock"></i></time>
                            &middot
                            <span title="La publication peut être vu par tout le monde."> <i class="fa fa-globe-africa"></i> @{{ post.scope }}</span>
                        </span>
        
                    </div>
                </div>
            </div>
            <div class="body pl-4 pr-4 pb-3" v-html="post.content"></div>
        </div>
    </div>
</div>
  