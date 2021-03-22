<div class="p-1 sugg-item">
    <div class="last-feature mb-3">
      <div class="resac-linkedin-shadow bg-white pb-2">
        <div class="header pl-3 pt-3 pb-2 pr-4">
          <div class="media">
            <a v-bind:title="suggestion.user.fullname" v-bind:href="suggestion.user.profil">
              <img class="border rounded-circle wh-40" v-bind:src="suggestion.user.photo"  v-bind:alt="'Photo '+ suggestion.user.fullname">
            </a>
            <div class="ml-3 media-body">
              <div class="mt-0 pub-user-name small">
                  <a v-bind:href="suggestion.user.profil" v-text="suggestion.user.fullname"></a> &nbsp;
              </div> 
              <div>
                  <span class="text-muted" style="font-size: 10px; position: relative;top: -6px;">
                        <span title="La publication peut être vu par tout le monde." class="text-muted">
                            <i v-for="i in suggestion.note" class="fa color-star fa-star"></i><i v-for="i in (5 - suggestion.note)" class="far fa-star"></i>
                        </span>
                      &middot;
                      <time v-bind:datetime="suggestion.created_at" v-bind:title="suggestion.created_at" class="timeago"></time> 
                  </span>
              </div>
            </div>
          </div>
        </div>
        <div class="body pl-3 pr-4 small" v-text="suggestion.content"></div>
        <div>
            <div class="pl-3 pr-4">
              <div class="text-right small">
                <a href="#noter" v-on:click="EditSuggestion(i)" class="notation text-muted"> <i class="fa fa-edit"></i> </a>
                <a href="#noter" v-on:click="DelSuggestion(i)" class="notation text-muted"> <i class="fa fa-trash"></i> </a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>