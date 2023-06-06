<?php
  
namespace App\Http\Controllers;
  
use App\Models\Nilai_MK_Hana;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class NilaiMKHanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $nilais = Nilai_MK_Hana::latest()->paginate(5);
        
        return view('nilaimkhana.index',compact('nilaimkhana'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('nilaimkhana.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_mk' => 'required',
            'namamk' => 'required',
            'nilaimk' => 'required',
        ]);
        
       Nilai_MK_Hana::create($request->all());
         
        return redirect()->route('bentuks.index')
                        ->with('success','bentuk created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Nilai_MK_Hana $bentuk): View
    {
        return view('bentuks.show',compact('bentuk'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai_MK_Hana $bentuk): View
    {
        return view('bentuks.edit',compact('bentuk'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai_MK_Hana $bentuk): RedirectResponse
    {
        $request->validate([
            'id_mk' => 'required',
            'namamk' => 'required',
            'nilaimk' => 'required',
        ]);
        
        $bentuk->update($request->all());
        
        return redirect()->route('bentuks.index')
                        ->with('success','bentuk updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai_MK_Hana $bentuk): RedirectResponse
    {
        $bentuk->delete();
         
        return redirect()->route('nilais.index')
                        ->with('success','bentuk deleted successfully');
    }
}