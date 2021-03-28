/* v1 Affichage des composants de suggestions d'un utilisateur */
/* Depend de swal.confirm.js */


function MySuggestionVue(config){

    var vue_element = config.vue_element;
    var suggestions_data = config.suggestions;
    var v_loader = config.loader;
    var v_sugg_grid = config.grid;
    var v_sugg_edit_modal = config.edit_modal;

    var vm_notes = new Vue({

        el: vue_element,

        data:{
            current_suggestion: null,
            show_suggestions: false,
            suggestions: [],
            editor:{
                suggestion_id:null,
                suggestion_content:null,
                update_url:null
            }
        },

        mounted: function (){

            this.suggestions = suggestions_data;

            // Si un loader a été précisé alors on le retire et affichage des suggestions
            if(v_loader){
                $(v_loader).addClass('d-none');
            }
            $(v_sugg_grid).removeClass('d-none');
        }, 

        methods:{

            DelSuggestion: function (i){
                url = this.suggestions[i].urls.delete;
                show_confirm_dialog("Voulez vous vraiment supprimée cette suggestion ?",url)
            },

            EditSuggestion: function (i){
                $(v_sugg_edit_modal).modal('show');
                this.editor.suggestion_id = this.suggestions[i].id;
                this.editor.suggestion_content = this.suggestions[i].content;
                this.editor.update_url = this.suggestions[i].urls.update;
            }

        }

    });

    return vm_notes;

}



