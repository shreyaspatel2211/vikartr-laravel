<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view portfolio', ['only' => ['index']]);
        $this->middleware('permission:create portfolio', ['only' => ['create','store']]);
        $this->middleware('permission:update portfolio', ['only' => ['update','edit']]);
        $this->middleware('permission:delete portfolio', ['only' => ['destroy']]);
    }
    public function index(PortfolioDataTable $dataTable){
        return $dataTable->render('admin.portfolio.index');
    }
    public function create()
    {
        $countries = Country::all();
        return view('admin.portfolio.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'country_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'country_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sourceType' => 'required',
            'source_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $sanitizedDescription = strip_tags($validatedData['description']);

        $streams = implode(',', $request->input('streams'));

    
        $portfolio = new Portfolio();
        $portfolio->name = $validatedData['name'];
        $portfolio->country_id = $validatedData['country_id'];
        $portfolio->description = $sanitizedDescription;
        $portfolio->streams = $streams;
        $portfolio->sourceType = $validatedData['sourceType'];
        $portfolio->slug = $validatedData['slug'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image using Storage::put
            $path = 'public/storage/images/portfolio/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Save the image name to the team instance
            $portfolio->image = $path;
        }
        if ($request->hasFile('source_logo')) {
            $sourceLogo = $request->file('source_logo');
            $sourceLogoName = time() . '_source.' . $sourceLogo->getClientOriginalExtension();

            // Store the banner image using Storage::put
            $sourceLogoPath = 'public/storage/images/portfolio/' . $sourceLogoName;
            Storage::put($sourceLogoPath, file_get_contents($sourceLogo));

            // Save the banner image path to the blog instance
            $portfolio->source_logo = $sourceLogoPath;
        }

        if ($request->hasFile('country_logo')) {
            $countryLogo = $request->file('country_logo');
            $countryLogoName = time() . '_country.' . $countryLogo->getClientOriginalExtension();

            // Store the banner image using Storage::put
            $countryLogoPath = 'public/storage/images/portfolio/' . $countryLogoName;
            Storage::put($countryLogoPath, file_get_contents($countryLogo));

            // Save the banner image path to the blog instance
            $portfolio->country_logo = $countryLogoPath;
        }
        $portfolio->save();

        return redirect('/portfolios')->with('success', 'Portfolio added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $streams = explode(',', $portfolio->streams); 
        $countries = Country::all();
        return view('admin.portfolio.edit', ['portfolio' => $portfolio, 'streams' => $streams,'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form input
        $updateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'country_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'country_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sourceType' => 'required',
            'source_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'streams' => 'required|array',
        ]);

    
        $updateData['description'] = strip_tags($updateData['description']);
        $updateData['streams'] = implode(',', $request->streams); // Convert array to comma-separated string

        // Find the team instance
        $portfolio = Portfolio::findOrFail($id);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // Get the new image file
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image using Storage::put
            $path = 'public/storage/images/portfolio/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Delete the old image if exists
            if ($portfolio->image) {
                Storage::delete($portfolio->image);
            }

            // Save the new image path to the update data
            $updateData['image'] = $path;
        }
        if ($request->hasFile('country_logo')) {
            $countryLogo = $request->file('country_logo');
            $countryLogoName = time() . '_country.' . $countryLogo->getClientOriginalExtension();
            $countryLogoPath = $countryLogo->storeAs('public/storage/images/portfolio/', $countryLogoName);

            if ($portfolio->country_logo) {
                Storage::delete($portfolio->country_logo);
            }

            $updateData['country_logo'] = $countryLogoPath;
        }
        if ($request->hasFile('source_logo')) {
            $sourceLogo = $request->file('source_logo');
            $sourceLogoName = time() . '_source.' . $sourceLogo->getClientOriginalExtension();
            $sourceLogoPath = $sourceLogo->storeAs('public/storage/images/portfolio/', $sourceLogoName);

            if ($portfolio->source_logo) {
                Storage::delete($portfolio->source_logo);
            }

            $updateData['source_logo'] = $sourceLogoPath;
        }

        // Update the team's data
        $portfolio->update($updateData);

        return redirect('/portfolios')->with('completed', 'Portfolio has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        return redirect('/portfolios')->with('completed', 'Portfolio has been deleted');
    }
}
