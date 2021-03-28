<?php

namespace App\Http\Resources\Suggestion;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Resources\User\UserSuggestionResource;

class SuggestionCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $suggestions_tmp = $this->collection;

        $suggestions = [];

        foreach ($suggestions_tmp as $suggestion) {

            $noteurs = $suggestion->noteurs()->withPivot('note')->get();

            $suggestions[] = [
                'id' => $suggestion->id,
                'content' => $suggestion->content,
                'created_at' => $suggestion->created_at,
                'note' => $suggestion->note,
                'show_notation_form' => 0,
                'noter' => route('backend.suggestions.noter',$suggestion->id),
                'noteurs' => UserSuggestionResource::collection($noteurs),
                'user' => [
                    'id' => $suggestion->user->id,
                    'fullname' => $suggestion->user->fullname,
                    'photo' => photos_cdn_asset($suggestion->user),
                    'profil' =>  route('profil.visitor',$suggestion->user->id)
                ],
                'urls' => [
                    'update' =>  route('backend.suggestions.update',$suggestion->id),
                    'delete' =>  route('backend.suggestions.delete',$suggestion->id)
                ]
            ];
        }

        return $suggestions;
    }
}
