/* v1.1 Affichage des composants de suggestions avec notation */

function SuggestionVue(config){

    var vue_element = config.vue_element;
    var suggestions_data = config.suggestions;
    var v_loader = config.loader;
    var v_sugg_grid = config.grid;
    var user_auth_id = config.user_auth_id;

    // Si l'id de l'utilisateur n'est pas définie arrête m'exécution de fonction
    if(!user_auth_id){
        console.error("user_auth_id undefined");
        return ;
    }

    var vm_notes = new Vue({

    el: vue_element,

    data:{
        current_suggestion: null, // Suggestion courante 
        show_suggestions: false, // Indique si les suggestions doivent s'afficher
        suggestions: [], // Liste des suggestions
        user_auth_id: user_auth_id, // Id de l'utilisateur connecté
    },

    mounted: function (){
        
        // Ajout des attributs show_notation_form et form_note pour la notation
        // Identification des suggestions déjà notée
        suggestions_data.forEach(suggestion => {
            suggestion.show_notation_form = 0
            suggestion.form_note = 0

            for (let i = 0; i < suggestion.noteurs.length; i++) {
                suggestion.already_note = false;
                suggestion.auth_user_note = null;
                if(suggestion.noteurs[i].id == this.user_auth_id){
                    suggestion.auth_user_note = suggestion.noteurs[i].note;
                    suggestion.already_note = true;
                }
            }
        });

        this.suggestions = suggestions_data;

        // Si un loader a été précisé alors on le retire et affichage des suggestions
        if(v_loader){
            $(v_loader).addClass('d-none');
        }
        $(v_sugg_grid).removeClass('d-none');

    }, 

    methods:{
        OpenNoter: function (i){

        if(this.current_suggestion != null){
            current_suggestion = this.suggestions[this.current_suggestion];
            current_suggestion.show_notation_form = 0;
            current_suggestion.form_note = 0;
        }
        
        suggestion = this.suggestions[i];

        this.current_suggestion = i;
        suggestion.show_notation_form = 1;

        }
    }

    });

    return vm_notes;

}



