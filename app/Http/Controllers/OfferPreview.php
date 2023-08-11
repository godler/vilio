<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Settings;
use App\Models\Template;
use Illuminate\Http\Request;

class OfferPreview extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $offer = Offer::where('id', $id)->with(['customer', 'address', 'preview_products'])->first();
        $template = Template::find(1);

        $loader = new \Twig\Loader\ArrayLoader([
            'index' => $template->content,
        ]);
        $twig = new \Twig\Environment($loader);
        
        $content = $twig->render('index', ['offer' => $offer, 'settings' => Settings::first(), 'products' => $offer->preview_products]); 

        return view('previews.offer', [
            'content' => $content,
            'styles' => $template->styles
        ]);
    }
}
