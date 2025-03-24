<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Services\Menu\MenuService;



class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(Request $request)
    {
        $this->menuService->create($request);

        return redirect('admin/menu/list');
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'menus' => $this->menuService->getAll()
        ]);
    }
    public function destroy($id)
    {
        $menu = Menu::where('id', $id)->first();
        $menu->delete();

        return redirect()->back();
        // $result = $this->menuService->destroy($request);
        // if ($result) {
        //     return response()->json([
        //         'error' => false,
        //         'message' => ' Xóa thành công danh mục'
        //     ]);
        // }
        // return response()->json([
        //     'error' => true
        // ]);
    }
    public function show($id)
    {
        $menu = Menu::where('id', $id)->first();
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa thư mục',
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }



    public function update(Request $request, $id)
    {
        // $this->menuService->update($request, $menu);
        $menu = Menu::where('id', $id)->first();


        if ($request->name) {
            $menu->name = $request->name;
        }

        if ($request->parent_id) {
            $menu->parent_id = $request->parent_id;
        }

        if ($request->description) {
            $menu->description = $request->description;
        }

        if ($request->status) {
            $menu->status = $request->status;
        }

        $menu->save();

        return redirect('/admin/menu/list');
    }
}