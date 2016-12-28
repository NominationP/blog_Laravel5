<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MarkdownPagesController extends Controller
{
    public function getReleaseNotes()
    {
        return $this->markdownView('pages.release-notes');
    }

    protected function markdownView($markdownViewName)
    {
        return view('layouts.markdown', [
            'markdownViewName' => $markdownViewName,
        ]);
    }
}