<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletter.showNewsletter', compact('newsletters'));
    }
    public function store(Request $request)
    {
        $news = new Newsletter;
        $news->email = $request->email;
        $news->save();

        return response($news);
    }
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();

        return redirect()->back();
    }
}
