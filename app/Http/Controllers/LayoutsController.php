<?php



namespace App\Http\Controllers;



use App\layouts;

use App\Http\Requests\LayoutRequest;

use Illuminate\Http\Request;



class LayoutsController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $data = layouts::first();

        return view('admin.layout.layoutSetting', compact('data'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\layouts  $layouts

     * @return \Illuminate\Http\Response

     */

    public function show(layouts $layouts)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\layouts  $layouts

     * @return \Illuminate\Http\Response

     */

    public function edit(layouts $layouts)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\layouts  $layouts

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, layouts $layouts)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\layouts  $layouts

     * @return \Illuminate\Http\Response

     */

    public function destroy(layouts $layouts)

    {

        //

    }

    public function AddEditLayout(LayoutRequest $request)

    {

        $postData = $request->all();

        $image = $request->file('header_logo') ?? '';

        if (!empty($image)) {

            $uploadPath = public_path('/uploads/image');

            $extension = $image->getClientOriginalExtension();

            $fileName = time() . "_" . rand(11111, 99999) . '.' . $extension;

            $image->move($uploadPath, $fileName);

            $imagename = $fileName;

            $postData['header_logo'] = $imagename;

        }

        $image = $request->file('footer_logo') ?? '';

        if (!empty($image)) {



            $uploadPath = public_path('/uploads/image');

            $extension = $image->getClientOriginalExtension();

            $fileName = time() . "_" . rand(11111, 99999) . '.' . $extension;

            $image->move($uploadPath, $fileName);

            $imagename = $fileName;

            $postData['footer_logo'] = $imagename;

        }

        $layout = layouts::first();

        if ($layout)

            layouts::updateOrCreate(["id" => $layout->id], $postData);

        else

            layouts::create($postData);

        return response()->json(['status' => 1,  'success' => 'Record added successfully']);

        //

    }

}

