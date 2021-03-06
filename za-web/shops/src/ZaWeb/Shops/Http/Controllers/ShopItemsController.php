<?php namespace ZaWeb\Shops\Http\Controllers;

use App\Facades\ImageUploadFacade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Attachment;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Collective\Annotations\Routing\Annotations\Annotations\Resource;
use Illuminate\Http\Request;
use ZaWeb\Shops\Models\Shops;
use ZaWeb\Shops\Models\ShopItems;
use ZaWeb\Shops\Http\Requests\ShopItemsRequest;
/**
 * Class ShopItemsController
 * @package ZaWeb\Shops\Http\Controllers
 * @Resource("shopitems")
 * @Middleware("auth", except={"index"}))
 */
class ShopItemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @Get("shopitems")
     * @Middleware("auth")
	 */
	public function index()
	{
		$items = ShopItems::all();
        return view('shops::shopitems.show', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @Get("/shopitems/create/{shop_id}")
	 * @Middleware("auth")
	 */
	public function create(ShopItems $items, $shop_id)
	{
		$shop = Shops::find($shop_id);
        if ($shop && $shop->canAddItem()) {

			$categories = \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $shop_id");

		    return view('shops::shopitems.create', compact('items', 'shop_id', 'categories'));
        } else {
            return redirect()->route('shops.my');
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ShopItemsRequest $request
	 * @return Response
	 */
        public function store(ShopItemsRequest $request)
	{
        $shop = Shops::find($request->shop_id);
        if ($shop && !$shop->canAddItem()) {
            return redirect()->route('shops.my');
        }

		$request->file();

		$file = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shop_items');

		$item = new ShopItems();
		$item->fill($request->all());

        if ($file) {
		    $item->attachment()->associate($file);
        }
		$item->save();

		return redirect()->route('shops.show', ['id'=>$request->shop_id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
     * @Middleware("auth")
	 */
	public function show($id)
	{
        $shops = Shops::with('items')->find($id);

        return view('shops::shopitems.index', compact('shops'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @Get("/shopitems/{id}/edit", as="shopitems.edit")
	 * @Middleware("auth")
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
        $items = ShopItems::with('attachment')->find($id);
        $shop_id = $items->shop_id;

		$categories = \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $shop_id");

        return view('shops::shopitems.edit', compact('items', 'shop_id', 'categories'));

	}

	/**
	 * Update the specified resource in storage.
	 * @Middleware("auth")
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id)
	{
        $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shop_items');

        $item = ShopItems::find($id);

        $item->fill($request->all());

        if ($attachment) {
            $item->attachment()->associate($attachment);
        }
        $item->save();
        return redirect()->away("/shopitems/$request->shop_id");
	}

	/**
	 * Remove the specified resource from storage.
	 *
     * @Middleware("auth")
	 */
	public function destroy($id)
	{
		ShopItems::find($id)->delete();
        return back();
	}

}
