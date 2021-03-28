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
            <template v-if="suggestion.user.id == user_auth_id">
              <div class="pl-3 pr-4">
                <div class="mt-2 pt-2 border-top small d-flex align-items-center justify-content-between">
                  <div>
                    Ma suggestion
                  </div>
                </div>
              </div>
            </template>
            <template v-else="suggestion.user.id != user_auth_id">
              <div v-if="!suggestion.show_notation_form" class="pl-3 pr-4">
                <div v-if="!suggestion.already_note" class="text-right">
                  <a href="#noter" v-on:click="OpenNoter(i)" class="notation text-muted"> <i class="fa fa-star"></i> </a>
                </div>
                <div v-else="!suggestion.already_note" class="mt-2 pt-2 border-top small d-flex align-items-center justify-content-between">
                  <div>
                    Ma note
                  </div>
                  <div>
                    <i v-for="i in suggestion.auth_user_note" class="fa text-muted fa-star"></i><i v-for="i in (5 - suggestion.auth_user_note)" class="far fa-star"></i>
                  </div>
                </div>
              </div>
            </template>

            <div v-if="suggestion.show_notation_form" class="border-top pl-3 pr-4 mt-2 pt-3">
                <div>
                    <form v-bind:action="suggestion.noter" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex justify-content-around small">
                                    <i v-for="i in suggestion.form_note" class="fa text-primary fa-star"></i><i v-for="i in (5 - suggestion.form_note)" class="far fa-star"></i>
                                </div>
                                <div class="pt-1">
                                    <input type="hidden" name="suggestion_id" v-bind:value="suggestion.id">
                                    <input type="range" v-model.number="suggestion.form_note" class="form-range" value="0" step="1" max="5" name="note">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary" type="submit">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
              <div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>