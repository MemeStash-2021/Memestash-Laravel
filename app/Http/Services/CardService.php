<?php


namespace App\Http\Services;


use App\Exceptions\ImproperResourceException;
use App\Models\Card;
use App\Models\CardNl;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CardService
{
    private $model;

    function __construct(Card $card)
    {
        $this->model = $card;
    }

    /**
     * Retrieves all cards from the database. The Query filters `name`, `id` can be passed along. The request will also honor any languages set in the locale
     * @param Request $request
     * @return string
     */
    public function getCards(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');
        $res = Card::all();
        if (App::getLocale() == "nl_BE") {
            $res = $this->getTranslations();
        }
        if ($id !== null) {
            return collect($res)->where('id', $id)->toJson();
        } else if ($name !== null) {
            return collect($res)->filter(function ($value, $key) use ($name) {
                return str_contains(strtolower(collect($value)->get('name')), strtolower($name));
            })->toJson();
        }
        return collect($res)->toJson();
    }

    /**
     * Returns a user and all their cards.
     * @param int $id
     * @return string
     */
    public function getUserCards($id): string
    {
        $res = User::with('card')->findOrFail($id);
        $cards = collect($res)->get('card');
        $count = count($cards);
        return collect($res)
            ->forget(["name", "wallet", "email"])
            ->put("count", $count)
            ->forget('card')
            ->put('cards', $cards);
    }

    /**
     * Add a card to a user's collection
     * @param int $ouid
     * @param int $cid
     * @return string
     */
    public function addCard(int $ouid, int $cid): string
    {
        $card = Card::findOrFail($cid);
        $user = User::findOrFail($ouid);
        if ($card->price > $user->wallet){
            throw new ImproperResourceException();
        }
        $user->wallet = $user->wallet - $card->price;
        $user->save();
        $entry = new Collection;
        $entry->user_id = $ouid;
        $entry->card_id = $cid;
        $entry->save();
        return $this->getUserCards($ouid);
    }

    private function getTranslations(): array
    {
        $res = [];
        $cards = CardNl::with(['card'])->get();
        foreach ($cards as $card) {
            $info = collect($card)->pull('card');
            array_push($res, collect($info)->merge($card)->forget(['card_id', 'card']));
        }
        return $res;
    }
}
